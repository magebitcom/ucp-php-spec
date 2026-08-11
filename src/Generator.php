<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Orchestrates generation of the single mutable interface tree from the UCP schema bundles
 */
class Generator
{
    private SchemaParser $parser;
    private TypeMapper $typeMapper;
    private PhpDocGenerator $phpDocGenerator;
    private InterfaceBuilder $builder;
    private DtoBuilder $dtoBuilder;
    private string $specDir;
    private string $outputDir;
    private array $errors = [];
    private array $schemaFiles = [];

    /**
     * @param string $specDir Directory containing the JSON Schema bundles
     * @param string $outputDir Directory for generated interfaces
     */
    public function __construct(string $specDir, string $outputDir)
    {
        $this->specDir = rtrim($specDir, '/');
        $this->outputDir = rtrim($outputDir, '/');
        $this->parser = new SchemaParser($this->specDir);
        $this->typeMapper = new TypeMapper($this->parser);
        $this->phpDocGenerator = new PhpDocGenerator($this->parser, $this->typeMapper);
        $this->builder = new InterfaceBuilder($this->parser, $this->typeMapper, $this->phpDocGenerator);
        $this->dtoBuilder = new DtoBuilder(
            $this->parser,
            $this->typeMapper,
            $this->phpDocGenerator,
            $this->builder
        );
    }

    /**
     * @return void
     * @throws \RuntimeException If the spec directory is missing
     */
    public function generate(): void
    {
        if (!is_dir($this->specDir)) {
            throw new \RuntimeException("Spec directory not found: {$this->specDir}");
        }

        $this->errors = [];
        $this->schemaFiles = $this->parser->findSchemaFiles($this->specDir);

        echo 'Found ' . count($this->schemaFiles) . " schema bundles\n";

        foreach ($this->schemaFiles as $schemaFile) {
            $this->processBundle($schemaFile);
        }

        echo "\nGenerated " . count($this->builder->getGeneratedInterfaces()) . ' interfaces and '
            . count($this->dtoBuilder->getGeneratedDtos()) . " DTOs into {$this->outputDir}\n";
    }

    /**
     * @return string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return array<string, string[]> Map of FQN to the extra sources that reused it
     */
    public function getCollisions(): array
    {
        return $this->builder->getCollisions();
    }

    /**
     * @return string[]
     */
    public function getConstantWarnings(): array
    {
        return $this->builder->getConstantWarnings();
    }

    /**
     * @return string[] Absolute paths, in generation order
     */
    public function getSchemaFiles(): array
    {
        return $this->schemaFiles;
    }

    /**
     * @return void
     */
    public function cleanOutputDirectory(): void
    {
        if (!is_dir($this->outputDir)) {
            return;
        }

        $this->removeDirectory($this->outputDir);
        mkdir($this->outputDir, 0755, true);
    }

    /**
     * @param string $filePath Path to a schema bundle
     * @return void
     */
    private function processBundle(string $filePath): void
    {
        echo 'Processing: ' . basename($filePath) . "\n";

        try {
            $schema = $this->parser->loadSchema($filePath);
        } catch (\RuntimeException $e) {
            $this->recordError("{$filePath}: " . $e->getMessage());
            return;
        }

        $namespace = $this->parser->getNamespaceFromPath($filePath);

        if ($this->parser->hasRootObject($filePath)) {
            $rootName = $this->parser->getInterfaceName($schema, $filePath);
            $this->emit($rootName, $schema, $namespace, $filePath);
        }

        foreach ($this->parser->getDefinitions($filePath) as $defName => $definition) {
            $this->processDefinition((string)$defName, $definition, $namespace, $filePath);
        }
    }

    /**
     * @param string $defName Name of the definition
     * @param array $definition Definition schema
     * @param string $namespace Namespace for the interface
     * @param string $currentFile File the definition lives in
     * @return void
     */
    private function processDefinition(
        string $defName,
        array $definition,
        string $namespace,
        string $currentFile
    ): void {
        if ($this->parser->isRefAlias($definition)) {
            try {
                $target = $this->parser->resolveRefTarget($definition['$ref'], $currentFile);
            } catch (\RuntimeException $e) {
                $this->recordError("Cannot resolve alias {$defName} in {$currentFile}: " . $e->getMessage());
                return;
            }

            $definition = $target['schema'];
            $currentFile = $target['file'];

            // An alias is just another spelling of the target, and TypeMapper names references to it
            // after the target's file. Following suit here makes the emission deduplicate instead of
            // producing an unreferenced twin under the declaring file's namespace.
            $namespace = $this->parser->getNamespaceFromPath($currentFile);
        }

        // Must stay in step with TypeMapper: anything it types as a value must not get an interface,
        // and anything it types as an interface must get one.
        if (!$this->needsInterface($definition)) {
            return;
        }

        $this->emit(
            $this->typeMapper->definitionInterfaceName($defName, $currentFile),
            $definition,
            $namespace,
            $currentFile
        );
    }

    /**
     * @param array $schema Schema fragment
     * @return bool
     */
    private function needsInterface(array $schema): bool
    {
        if (isset($schema['properties']) && is_array($schema['properties']) && $schema['properties'] !== []) {
            return true;
        }

        return isset($schema['allOf']) || isset($schema['oneOf']) || isset($schema['anyOf']);
    }

    /**
     * @param string $interfaceName Interface name, with or without the suffix
     * @param array $schema Schema to emit
     * @param string $namespace Namespace for the interface
     * @param string $currentFile File the schema lives in
     * @return void
     */
    private function emit(string $interfaceName, array $schema, string $namespace, string $currentFile): void
    {
        if ($this->builder->isGenerated($namespace, $interfaceName, $currentFile)) {
            return;
        }

        try {
            $file = $this->builder->buildInterface($interfaceName, $schema, $namespace, $currentFile);
            $this->builder->saveInterface($file, $this->outputDir, $namespace, $interfaceName);

            $dto = $this->dtoBuilder->buildDto($interfaceName, $schema, $namespace, $currentFile);
            $this->dtoBuilder->saveDto($dto, $this->outputDir, $namespace, $interfaceName);
        } catch (\RuntimeException $e) {
            $this->recordError("Cannot build {$namespace}\\{$interfaceName}: " . $e->getMessage());
            return;
        }

        $this->builder->markGenerated($namespace, $interfaceName, $currentFile);

        $this->processInlineObjects($schema, $this->builder->normalizeInterfaceName($interfaceName), $namespace, $currentFile);
    }

    /**
     * Getters come from the composed schema, so inline interfaces have to be discovered from the
     * same composed view or they end up referenced but never emitted.
     *
     * @param array $schema Schema definition
     * @param string $parentName Parent interface name
     * @param string $namespace Namespace for generated interfaces
     * @param string $currentFile File the schema lives in
     * @return void
     */
    private function processInlineObjects(
        array $schema,
        string $parentName,
        string $namespace,
        string $currentFile
    ): void {
        try {
            $merged = $this->builder->resolveCompositeSchema($schema, $currentFile);
        } catch (\RuntimeException $e) {
            $this->recordError("Cannot compose {$parentName} in {$currentFile}: " . $e->getMessage());
            return;
        }

        foreach ($merged['properties'] ?? [] as $propertyName => $property) {
            if (!is_array($property)) {
                continue;
            }

            if ($this->typeMapper->isInlineObject($property)) {
                $this->emitInlineObject($parentName, (string)$propertyName, $property, $namespace, $currentFile);
            }

            if (isset($property['items']) && is_array($property['items'])
                && $this->typeMapper->isInlineObject($property['items'])) {
                $this->emitInlineObject(
                    $parentName,
                    $propertyName . '_item',
                    $property['items'],
                    $namespace,
                    $currentFile
                );
            }
        }
    }

    /**
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @param array $property Property schema definition
     * @param string $namespace Namespace for the interface
     * @param string $currentFile File the property is declared in
     * @return void
     */
    private function emitInlineObject(
        string $parentName,
        string $propertyName,
        array $property,
        string $namespace,
        string $currentFile
    ): void {
        $interfaceName = $this->typeMapper->generateInlineInterfaceName($parentName, $propertyName);

        if ($this->builder->isGenerated($namespace, $interfaceName, $currentFile)) {
            return;
        }

        try {
            $file = $this->builder->buildInlineObjectInterface(
                $parentName,
                $propertyName,
                $property,
                $namespace,
                $currentFile
            );
            $this->builder->saveInterface($file, $this->outputDir, $namespace, $interfaceName);

            $dto = $this->dtoBuilder->buildDto($interfaceName, $property, $namespace, $currentFile);
            $this->dtoBuilder->saveDto($dto, $this->outputDir, $namespace, $interfaceName);
        } catch (\RuntimeException $e) {
            $this->recordError("Cannot build {$namespace}\\{$interfaceName}: " . $e->getMessage());
            return;
        }

        $this->builder->markGenerated($namespace, $interfaceName, $currentFile);

        $this->processInlineObjects($property, $interfaceName, $namespace, $currentFile);
    }

    /**
     * @param string $message Error message
     * @return void
     */
    private function recordError(string $message): void
    {
        $this->errors[] = $message;
        echo "  Error: {$message}\n";
    }

    /**
     * @param string $dir Directory to remove
     * @return void
     */
    private function removeDirectory(string $dir): void
    {
        if (!is_dir($dir)) {
            return;
        }

        foreach (array_diff(scandir($dir) ?: [], ['.', '..']) as $entry) {
            $path = $dir . '/' . $entry;
            is_dir($path) ? $this->removeDirectory($path) : unlink($path);
        }

        rmdir($dir);
    }
}
