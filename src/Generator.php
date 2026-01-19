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
    private InterfaceBuilder $builder;
    private string $outputDir;
    private array $processedFiles = [];

    /**
     * Constructor
     *
     * @param string $specDir Directory containing JSON Schema files
     * @param string $outputDir Directory for generated interfaces
     */
    public function __construct(string $specDir, string $outputDir)
    {
        $this->parser = new SchemaParser($specDir);
        $this->typeMapper = new TypeMapper($this->parser);
        $this->builder = new InterfaceBuilder($this->parser, $this->typeMapper);
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

        // For this project, scan the spec directory
        $specDir = dirname(__DIR__) . '/spec';
        
        if (!is_dir($specDir)) {
            throw new \RuntimeException("Spec directory not found: {$specDir}");
        }

        $schemaFiles = $this->parser->findSchemaFiles($specDir);

        echo "Found " . count($schemaFiles) . " schema files\n";

        // Process each schema file
        foreach ($schemaFiles as $schemaFile) {
            $this->processSchemaFile($schemaFile);
        }

        echo "\nGeneration complete!\n";
        echo "Generated " . count($this->builder->getGeneratedInterfaces()) . " interfaces\n";
        echo "Output directory: " . $this->outputDir . "\n";
    }

    /**
     * Process a single schema file
     *
     * @param string $filePath Path to the schema file
     * @return void
     */
    private function processSchemaFile(string $filePath): void
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
            $namespace = $this->parser->getNamespaceFromPath($filePath);

            // Generate interface for root schema if it's an object
            if ($this->parser->hasRootObject($filePath)) {
                $this->generateRootInterface($filePath, $schema, $namespace);
            }

            // Generate interfaces for all $defs
            $definitions = $this->parser->getDefinitions($filePath);
            foreach ($definitions as $defName => $definition) {
                $this->generateDefinitionInterface($defName, $definition, $namespace, $filePath);
            }

            // Process inline objects in properties
            if (isset($schema['properties'])) {
                $rootName = $this->parser->getInterfaceName($schema, $filePath);
                $this->processInlineObjects($schema['properties'], $rootName, $namespace, $filePath);
            }

        } catch (\Exception $e) {
            echo "  Error: " . $e->getMessage() . "\n";
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

        // Check if already generated
        if ($this->builder->isGenerated($namespace, $interfaceName)) {
            return;
        }

        echo "  Generating interface: {$interfaceName}\n";

        $file = $this->builder->buildInterface($interfaceName, $schema, $namespace, $filePath);
        $outputPath = $this->builder->saveInterface($file, $this->outputDir, $namespace, $interfaceName);
        
        $this->builder->markGenerated($namespace, $interfaceName);

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
        $schema = $this->parser->loadSchema($currentFile);
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

        // Check if already generated
        if ($this->builder->isGenerated($namespace, $interfaceName)) {
            return;
        }

        echo "  Generating definition interface: {$interfaceName}\n";

        $file = $this->builder->buildDefinitionInterface($interfaceName, $definition, $namespace, $currentFile);
        $outputPath = $this->builder->saveInterface($file, $this->outputDir, $namespace, $interfaceName);
        
        $this->builder->markGenerated($namespace, $interfaceName);

        echo "    Saved to: " . $this->getRelativePath($outputPath) . "\n";

        // Process inline objects in definition properties
        if (isset($definition['properties'])) {
            $this->processInlineObjects($definition['properties'], $interfaceName, $namespace, $currentFile);
        }
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

        // Check if already generated
        if ($this->builder->isGenerated($namespace, $interfaceName)) {
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
        
        $this->builder->markGenerated($namespace, $interfaceName);

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
