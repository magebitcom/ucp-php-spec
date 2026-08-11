<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Main generator class that orchestrates the generation process
 */
class Generator
{
    private SchemaParser $parser;
    private TypeMapper $typeMapper;
    private PhpDocGenerator $phpDocGenerator;
    private InterfaceBuilder $builder;
    private string $specDir;
    private string $outputDir;
    private array $processedFiles = [];
    private array $errors = [];
    private array $collisions = [];
    private array $schemaFiles = [];

    /**
     * Constructor
     *
     * @param string $specDir Directory containing JSON Schema files
     * @param string $outputDir Directory for generated interfaces
     */
    public function __construct(string $specDir, string $outputDir)
    {
        $this->specDir = rtrim($specDir, '/');
        $this->parser = new SchemaParser($specDir);
        $this->typeMapper = new TypeMapper($this->parser);
        $this->phpDocGenerator = new PhpDocGenerator($this->parser, $this->typeMapper);
        $this->builder = new InterfaceBuilder($this->parser, $this->typeMapper, $this->phpDocGenerator);
        $this->outputDir = rtrim($outputDir, '/');
    }

    /**
     * Generate all interfaces from spec directory
     *
     * @return void
     * @throws \RuntimeException If spec directory not found
     */
    public function generate(): void
    {
        echo "Starting interface generation...\n";

        if (!is_dir($this->specDir)) {
            throw new \RuntimeException("Spec directory not found: {$this->specDir}");
        }

        $this->errors = [];
        $this->collisions = [];
        $schemaFiles = $this->parser->findSchemaFiles($this->specDir);
        $this->schemaFiles = $schemaFiles;

        echo "Found " . count($schemaFiles) . " schema files\n";

        // Generate Api namespace (immutable - getters only)
        echo "\n=== Generating Api namespace (immutable) ===\n";
        $this->builder->setGenerateSetters(false);
        $this->builder->setNamespaceBase('Api');
        $this->typeMapper->setNamespaceBase('Api');
        
        foreach ($schemaFiles as $schemaFile) {
            $this->processSchemaFile($schemaFile, 'Api');
        }
        
        $apiCount = count($this->builder->getGeneratedInterfaces());
        $this->collectCollisions();

        // Reset for MutableApi generation
        $this->processedFiles = [];
        $this->builder = new InterfaceBuilder($this->parser, $this->typeMapper, $this->phpDocGenerator);

        // Generate MutableApi namespace (mutable - getters and setters)
        echo "\n=== Generating MutableApi namespace (mutable) ===\n";
        $this->builder->setGenerateSetters(true);
        $this->builder->setNamespaceBase('MutableApi');
        $this->typeMapper->setNamespaceBase('MutableApi');
        
        foreach ($schemaFiles as $schemaFile) {
            $this->processSchemaFile($schemaFile, 'MutableApi');
        }

        $mutableApiCount = count($this->builder->getGeneratedInterfaces());
        $this->collectCollisions();

        echo "\n=== Generation complete! ===\n";
        echo "Generated " . $apiCount . " Api interfaces (immutable)\n";
        echo "Generated " . $mutableApiCount . " MutableApi interfaces (mutable)\n";
        echo "Output directory: " . $this->outputDir . "\n";
    }

    /**
     * Record a non-fatal generation failure so the run can still be failed at the end
     *
     * @param string $message Error message
     * @return void
     */
    private function recordError(string $message): void
    {
        $this->errors[] = $message;
        echo "  Error: {$message}\n";
    }

    /**
     * Merge the current builder's collisions into the run-wide list
     *
     * @return void
     */
    private function collectCollisions(): void
    {
        foreach ($this->builder->getCollisions() as $key => $sources) {
            $this->collisions[$key] = array_merge($this->collisions[$key] ?? [], $sources);
        }
    }

    /**
     * Errors recorded during the last generate() run
     *
     * @return string[] Error messages
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Interface names produced from more than one schema source during the last run
     *
     * @return array<string, string[]> Map of FQN to the extra source files that reused it
     */
    public function getCollisions(): array
    {
        return $this->collisions;
    }

    /**
     * Schema files consumed by the last generate() run, in generation order
     *
     * @return string[] Absolute file paths
     */
    public function getSchemaFiles(): array
    {
        return $this->schemaFiles;
    }

    /**
     * Process a single schema file
     *
     * @param string $filePath Path to the schema file
     * @param string $namespaceBase Namespace base ('Api' or 'MutableApi')
     * @return void
     */
    private function processSchemaFile(string $filePath, string $namespaceBase = 'Api'): void
    {
        // Skip if already processed
        if (isset($this->processedFiles[$filePath])) {
            return;
        }

        $this->processedFiles[$filePath] = true;

        echo "Processing: " . basename($filePath) . "\n";

        try {
            $schema = $this->parser->loadSchema($filePath);

            // Get namespace for this file
            $namespace = $this->parser->getNamespaceFromPath($filePath, $namespaceBase);

            // Generate interface for root schema if it's an object
            if ($this->parser->hasRootObject($filePath)) {
                $this->generateRootInterface($filePath, $schema, $namespace);
            }

            // Generate interfaces for all $defs
            $definitions = $this->parser->getDefinitions($filePath);
            foreach ($definitions as $defName => $definition) {
                $this->generateDefinitionInterface($defName, $definition, $namespace, $filePath);
            }

            if ($this->parser->hasRootObject($filePath)) {
                $rootName = $this->parser->getInterfaceName($schema, $filePath);
                $this->processCompositeInlineObjects($schema, $rootName, $namespace, $filePath);
            }

        } catch (\Exception $e) {
            $this->recordError("{$filePath}: " . $e->getMessage());
        }
    }

    /**
     * Scan a schema's inline objects after allOf/oneOf/anyOf composition.
     *
     * Getters are emitted from the composed schema, so inline interfaces must be discovered
     * from the same composed view or they end up referenced but never generated.
     *
     * @param array $schema Schema definition
     * @param string $parentName Parent interface name
     * @param string $namespace Namespace for generated interfaces
     * @param string $currentFile Current file path
     * @return void
     */
    private function processCompositeInlineObjects(
        array $schema,
        string $parentName,
        string $namespace,
        string $currentFile
    ): void {
        try {
            $merged = $this->builder->resolveCompositeSchema($schema, $currentFile);
        } catch (\Exception $e) {
            $this->recordError("Cannot compose {$parentName} in {$currentFile}: " . $e->getMessage());
            return;
        }

        if (isset($merged['properties'])) {
            $this->processInlineObjects($merged['properties'], $parentName, $namespace, $currentFile);
        }
    }

    /**
     * Generate interface for root schema
     *
     * @param string $filePath Path to the schema file
     * @param array $schema Schema definition
     * @param string $namespace Namespace for the interface
     * @return void
     */
    private function generateRootInterface(string $filePath, array $schema, string $namespace): void
    {
        $interfaceName = $this->parser->getInterfaceName($schema, $filePath);

        if ($this->builder->isGenerated($namespace, $interfaceName, $filePath)) {
            return;
        }

        echo "  Generating interface: {$interfaceName}\n";

        $file = $this->builder->buildInterface($interfaceName, $schema, $namespace, $filePath);
        $outputPath = $this->builder->saveInterface($file, $this->outputDir, $namespace, $interfaceName);

        $this->builder->markGenerated($namespace, $interfaceName, $filePath);

        echo "    Saved to: " . $this->getRelativePath($outputPath) . "\n";
    }

    /**
     * Generate interface for a $defs definition
     *
     * @param string $defName Name of the definition
     * @param array $definition Definition schema
     * @param string $namespace Namespace for the interface
     * @param string $currentFile Current file path
     * @return void
     */
    private function generateDefinitionInterface(
        string $defName,
        array $definition,
        string $namespace,
        string $currentFile
    ): void {
        // A bare-$ref $def is an alias: TypeMapper still names an interface for it, so it must be
        // emitted from the target's body, resolved against the target's own file.
        $definitionFile = $currentFile;

        if ($this->parser->isRefAlias($definition)) {
            try {
                $target = $this->parser->resolveRefTarget($definition['$ref'], $currentFile);
            } catch (\Exception $e) {
                $this->recordError("Cannot resolve alias {$defName} in {$currentFile}: " . $e->getMessage());
                return;
            }

            $definition = $target['schema'];
            $definitionFile = $target['file'];
        }

        // Skip if not an object and doesn't have complex type indicators
        $hasComplexType = isset($definition['allOf']) ||
                         isset($definition['oneOf']) ||
                         isset($definition['anyOf']) ||
                         isset($definition['properties']);

        if (!$hasComplexType && (!isset($definition['type']) || $definition['type'] !== 'object')) {
            return;
        }

        // Skip if it's just an object with additionalProperties (map/dictionary type)
        if (isset($definition['type']) && 
            $definition['type'] === 'object' && 
            isset($definition['additionalProperties']) && 
            !isset($definition['properties']) &&
            !isset($definition['allOf']) &&
            !isset($definition['oneOf']) &&
            !isset($definition['anyOf'])) {
            return;
        }

        // Determine if we should prefix with filename
        // Only prefix if the file has no root schema (is a "definition library")
        $hasRootSchema = $this->parser->hasRootObject($currentFile);

        if ($hasRootSchema) {
            // File has a root schema, so $defs are supplementary - don't prefix
            $interfaceName = $this->sanitizeInterfaceName($defName);
        } else {
            // File is a definition library - prefix to avoid conflicts
            $fileBaseName = basename($currentFile, '.json');
            $fileBaseName = $this->sanitizeInterfaceName($fileBaseName);
            $defInterfaceName = $this->sanitizeInterfaceName($defName);
            $interfaceName = $fileBaseName . $defInterfaceName;
        }

        if ($this->builder->isGenerated($namespace, $interfaceName, $definitionFile)) {
            return;
        }

        echo "  Generating definition interface: {$interfaceName}\n";

        $file = $this->builder->buildDefinitionInterface($interfaceName, $definition, $namespace, $definitionFile);
        $outputPath = $this->builder->saveInterface($file, $this->outputDir, $namespace, $interfaceName);

        $this->builder->markGenerated($namespace, $interfaceName, $definitionFile);

        echo "    Saved to: " . $this->getRelativePath($outputPath) . "\n";

        $this->processCompositeInlineObjects($definition, $interfaceName, $namespace, $definitionFile);
    }

    /**
     * Process inline objects in properties
     *
     * @param array $properties Properties array from schema
     * @param string $parentName Parent interface name
     * @param string $namespace Namespace for generated interfaces
     * @param string $currentFile Current file path
     * @return void
     */
    private function processInlineObjects(
        array $properties,
        string $parentName,
        string $namespace,
        string $currentFile
    ): void {
        foreach ($properties as $propertyName => $property) {
            // Check if this is an inline object
            if ($this->typeMapper->isInlineObject($property)) {
                $this->generateInlineObjectInterface(
                    $parentName,
                    $propertyName,
                    $property,
                    $namespace,
                    $currentFile
                );
            }

            // Recursively process nested objects
            if (isset($property['properties'])) {
                $inlineName = $this->typeMapper->generateInlineInterfaceName($parentName, $propertyName);
                $this->processInlineObjects($property['properties'], $inlineName, $namespace, $currentFile);
            }

            // Process array items if they're inline objects
            if (isset($property['items']) && $this->typeMapper->isInlineObject($property['items'])) {
                $itemName = $parentName . ucfirst($propertyName) . 'Item';
                $this->generateInlineObjectInterface(
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
     * Generate interface for inline object
     *
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @param array $property Property schema definition
     * @param string $namespace Namespace for the interface
     * @param string $currentFile Current file path
     * @return void
     */
    private function generateInlineObjectInterface(
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

        echo "  Generating inline object interface: {$interfaceName}\n";

        $file = $this->builder->buildInlineObjectInterface(
            $parentName,
            $propertyName,
            $property,
            $namespace,
            $currentFile
        );
        $outputPath = $this->builder->saveInterface($file, $this->outputDir, $namespace, $interfaceName);

        $this->builder->markGenerated($namespace, $interfaceName, $currentFile);

        echo "    Saved to: " . $this->getRelativePath($outputPath) . "\n";
    }

    /**
     * Get relative path from output directory
     *
     * @param string $path Absolute path
     * @return string Relative path from output directory
     */
    private function getRelativePath(string $path): string
    {
        $outputDir = realpath($this->outputDir);
        $path = realpath($path);

        if ($outputDir && $path && strpos($path, $outputDir) === 0) {
            return substr($path, strlen($outputDir) + 1);
        }

        return $path;
    }

    /**
     * Sanitize interface name
     *
     * @param string $name Raw name to sanitize
     * @return string Valid PHP interface name in PascalCase
     */
    private function sanitizeInterfaceName(string $name): string
    {
        // Remove common suffixes
        $name = preg_replace('/\.(create_req|update_req|resp)$/', '', $name);
        $name = preg_replace('/_(create_req|update_req|resp)$/', '', $name);
        
        // Convert to PascalCase
        $name = str_replace(['-', '_', '.', ' '], ' ', $name);
        $name = ucwords($name);
        return str_replace(' ', '', $name);
    }

    /**
     * Clean output directory
     *
     * @return void
     */
    public function cleanOutputDirectory(): void
    {
        if (!is_dir($this->outputDir)) {
            return;
        }

        echo "Cleaning output directory...\n";

        $this->removeDirectory($this->outputDir);
        mkdir($this->outputDir, 0755, true);
    }

    /**
     * Remove directory recursively
     *
     * @param string $dir Directory path to remove
     * @return void
     */
    private function removeDirectory(string $dir): void
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);
        
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            
            if (is_dir($path)) {
                $this->removeDirectory($path);
            } else {
                unlink($path);
            }
        }

        rmdir($dir);
    }
}
