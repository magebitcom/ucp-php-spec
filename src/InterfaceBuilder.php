<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

use Nette\PhpGenerator\InterfaceType;
use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PsrPrinter;

/**
 * Builds PHP interfaces using nette/php-generator
 */
class InterfaceBuilder
{
    private SchemaParser $parser;
    private TypeMapper $typeMapper;
    private PsrPrinter $printer;
    private array $generatedInterfaces = [];

    /**
     * Constructor
     *
     * @param SchemaParser $parser Schema parser instance
     * @param TypeMapper $typeMapper Type mapper instance
     */
    public function __construct(SchemaParser $parser, TypeMapper $typeMapper)
    {
        $this->parser = $parser;
        $this->typeMapper = $typeMapper;
        $this->printer = new PsrPrinter();
    }

    /**
     * Build interface from schema
     *
     * @param string $interfaceName Name of the interface to generate
     * @param array $schema Schema definition
     * @param string $namespace Namespace for the interface
     * @param string $currentFile Current file path for resolving references
     * @return PhpFile Generated PHP file
     */
    public function buildInterface(
        string $interfaceName,
        array $schema,
        string $namespace,
        string $currentFile
    ): PhpFile {
        $file = new PhpFile();
        $file->setStrictTypes();
        $file->addComment('This file is auto-generated. Do not edit manually.');
        $file->addComment('');
        $file->addComment('@author    Magebit <info@magebit.com>');
        $file->addComment('@copyright Copyright (c) Magebit, Ltd. (https://magebit.com)');
        $file->addComment('@license   MIT');

        $ns = $file->addNamespace($namespace);
        $interface = $ns->addInterface($interfaceName);

        // Add interface description
        if (isset($schema['description'])) {
            $interface->addComment($schema['description']);
        }

        // Add title as comment if different from interface name
        if (isset($schema['title']) && $schema['title'] !== $interfaceName) {
            $interface->addComment('');
            $interface->addComment('Schema: ' . $schema['title']);
        }

        // Add properties as getter methods
        if (isset($schema['properties'])) {
            $this->addProperties($interface, $schema, $currentFile, $ns);
        }

        return $file;
    }

    /**
     * Add properties to interface as getter methods
     *
     * @param InterfaceType $interface Interface to add methods to
     * @param array $schema Schema containing properties
     * @param string $currentFile Current file path for resolving references
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace for use statements
     * @return void
     */
    private function addProperties(
        InterfaceType $interface,
        array $schema,
        string $currentFile,
        \Nette\PhpGenerator\PhpNamespace $namespace
    ): void {
        $properties = $schema['properties'] ?? [];
        $required = $schema['required'] ?? [];

        foreach ($properties as $propertyName => $property) {
            $this->addPropertyMethod($interface, $propertyName, $property, $required, $currentFile, $namespace);
        }
    }

    /**
     * Add a single property as getter method
     *
     * @param InterfaceType $interface Interface to add method to
     * @param string $propertyName Name of the property
     * @param array $property Property schema definition
     * @param array $required Array of required property names
     * @param string $currentFile Current file path for resolving references
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace for use statements
     * @return void
     */
    private function addPropertyMethod(
        InterfaceType $interface,
        string $propertyName,
        array $property,
        array $required,
        string $currentFile,
        \Nette\PhpGenerator\PhpNamespace $namespace
    ): void {
        // Convert property name to getter method name
        $methodName = 'get' . $this->toPascalCase($propertyName);

        $method = $interface->addMethod($methodName);

        // Add description
        if (isset($property['description'])) {
            $method->addComment($property['description']);
            $method->addComment('');
        }

        // Map type
        $phpType = $this->typeMapper->mapType($property, $currentFile);
        
        // Handle nullable types
        $isRequired = in_array($propertyName, $required);
        
        if (!$isRequired && $phpType !== 'mixed' && $phpType !== 'null') {
            // Make optional properties nullable
            if (strpos($phpType, '|') === false) {
                $phpType .= '|null';
            } elseif (strpos($phpType, 'null') === false) {
                $phpType .= '|null';
            }
        }

        // Add use statements for all referenced types
        $this->addUseStatementsForType($phpType, $namespace);

        // Set return type - Nette will handle the resolution based on use statements
        if ($phpType !== 'mixed') {
            $method->setReturnType($phpType);
        }

        // Generate PHPDoc type with array item types
        $commentType = $this->generatePhpDocType($property, $phpType, $currentFile, $namespace);
        $method->addComment('@return ' . $commentType);
    }

    /**
     * Generate PHPDoc type annotation with proper array item types
     *
     * @param array $property Property schema definition
     * @param string $phpType PHP type hint
     * @param string $currentFile Current file path for resolving references
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace for use statements
     * @return string PHPDoc type annotation (e.g., "Type[]" or "Type[]|null")
     */
    private function generatePhpDocType(
        array $property,
        string $phpType,
        string $currentFile,
        \Nette\PhpGenerator\PhpNamespace $namespace
    ): string {
        // Check if property is an array type
        $propertyType = $property['type'] ?? null;
        
        // Check if we're dealing with an array with items
        if ($propertyType === 'array' && isset($property['items'])) {
            $itemType = $this->typeMapper->getArrayItemType($property, $currentFile);
            
            if ($itemType !== null && $itemType !== 'mixed') {
                // Add use statement for item type
                $this->addUseStatementsForType($itemType, $namespace);
                
                // Simplify item type for PHPDoc
                $simplifiedItemType = $this->simplifyTypeForComment($itemType, $namespace);
                
                // Handle nullable arrays
                if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                    return $simplifiedItemType . '[]|null';
                }
                
                return $simplifiedItemType . '[]';
            }
        }

        // For non-array types or arrays without items, simplify normally
        return $this->simplifyTypeForComment($phpType, $namespace);
    }

    /**
     * Add use statements for all types in a type declaration
     *
     * @param string $type Type string (may contain union types)
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace to add use statements to
     * @return void
     */
    private function addUseStatementsForType(string $type, \Nette\PhpGenerator\PhpNamespace $namespace): void
    {
        // Handle union types
        if (strpos($type, '|') !== false) {
            $types = explode('|', $type);
            foreach ($types as $singleType) {
                $this->addUseStatementForSingleType(trim($singleType), $namespace);
            }
            return;
        }
        
        $this->addUseStatementForSingleType($type, $namespace);
    }

    /**
     * Add use statement for a single type
     *
     * @param string $type Single type string (no union types)
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace to add use statement to
     * @return void
     */
    private function addUseStatementForSingleType(string $type, \Nette\PhpGenerator\PhpNamespace $namespace): void
    {
        // Skip built-in types
        if (in_array($type, ['string', 'int', 'float', 'bool', 'array', 'object', 'mixed', 'null', 'void'])) {
            return;
        }

        // If it's a fully qualified name (starts with \), add use statement
        if (strpos($type, '\\') === 0) {
            $fqn = ltrim($type, '\\');
            
            // Check if it's in the same namespace
            $currentNamespace = $namespace->getName();
            $typeNamespace = substr($fqn, 0, strrpos($fqn, '\\'));
            
            if ($typeNamespace !== $currentNamespace) {
                // Different namespace, add use statement
                $namespace->addUse($fqn);
            }
        }
    }

    /**
     * Simplify type for PHPDoc comment (remove leading backslashes for imported types)
     *
     * @param string $type Type string (may contain union types)
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace for context
     * @return string Simplified type for PHPDoc
     */
    private function simplifyTypeForComment(string $type, \Nette\PhpGenerator\PhpNamespace $namespace): string
    {
        // Handle union types
        if (strpos($type, '|') !== false) {
            $types = explode('|', $type);
            $simplifiedTypes = [];
            
            foreach ($types as $singleType) {
                $simplifiedTypes[] = $this->simplifySingleTypeForComment(trim($singleType), $namespace);
            }
            
            return implode('|', $simplifiedTypes);
        }
        
        return $this->simplifySingleTypeForComment($type, $namespace);
    }

    /**
     * Simplify a single type for comment
     *
     * @param string $type Single type string (no union types)
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace for context
     * @return string Simplified type name
     */
    private function simplifySingleTypeForComment(string $type, \Nette\PhpGenerator\PhpNamespace $namespace): string
    {
        // Skip built-in types
        if (in_array($type, ['string', 'int', 'float', 'bool', 'array', 'object', 'mixed', 'null', 'void'])) {
            return $type;
        }

        // If it's a fully qualified name (starts with \), simplify it
        if (strpos($type, '\\') === 0) {
            $fqn = ltrim($type, '\\');
            
            // Check if it's in the same namespace
            $currentNamespace = $namespace->getName();
            $typeNamespace = substr($fqn, 0, strrpos($fqn, '\\'));
            
            // Return just the class name (with or without namespace doesn't matter for comment)
            $parts = explode('\\', $fqn);
            return end($parts);
        }

        return $type;
    }

    /**
     * Build interface for a $defs definition
     *
     * @param string $defName Name of the definition
     * @param array $definition Definition schema
     * @param string $namespace Namespace for the interface
     * @param string $currentFile Current file path for resolving references
     * @return PhpFile Generated PHP file
     */
    public function buildDefinitionInterface(
        string $defName,
        array $definition,
        string $namespace,
        string $currentFile
    ): PhpFile {
        $interfaceName = $this->sanitizeInterfaceName($defName);
        return $this->buildInterface($interfaceName, $definition, $namespace, $currentFile);
    }

    /**
     * Build interface for inline object
     *
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @param array $property Property schema definition
     * @param string $namespace Namespace for the interface
     * @param string $currentFile Current file path for resolving references
     * @return PhpFile Generated PHP file
     */
    public function buildInlineObjectInterface(
        string $parentName,
        string $propertyName,
        array $property,
        string $namespace,
        string $currentFile
    ): PhpFile {
        $interfaceName = $this->typeMapper->generateInlineInterfaceName($parentName, $propertyName);
        return $this->buildInterface($interfaceName, $property, $namespace, $currentFile);
    }

    /**
     * Save interface to file
     *
     * @param PhpFile $file PHP file to save
     * @param string $outputDir Output directory
     * @param string $namespace Namespace of the interface
     * @param string $interfaceName Interface name
     * @return string Path to the saved file
     */
    public function saveInterface(PhpFile $file, string $outputDir, string $namespace, string $interfaceName): string
    {
        // Convert namespace to directory structure
        $namespacePath = str_replace('\\', '/', $namespace);
        $directory = $outputDir . '/' . $namespacePath;

        // Create directory if it doesn't exist
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        // Generate file path
        $filePath = $directory . '/' . $interfaceName . '.php';

        // Write file
        file_put_contents($filePath, $this->printer->printFile($file));

        return $filePath;
    }

    /**
     * Convert snake_case to PascalCase
     *
     * @param string $name Name in snake_case
     * @return string Name in PascalCase
     */
    private function toPascalCase(string $name): string
    {
        $name = str_replace(['-', '_', '.'], ' ', $name);
        $name = ucwords($name);
        return str_replace(' ', '', $name);
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
        return $this->toPascalCase($name);
    }

    /**
     * Check if interface was already generated
     *
     * @param string $namespace Namespace of the interface
     * @param string $interfaceName Interface name
     * @return bool True if already generated
     */
    public function isGenerated(string $namespace, string $interfaceName): bool
    {
        $key = $namespace . '\\' . $interfaceName;
        return isset($this->generatedInterfaces[$key]);
    }

    /**
     * Mark interface as generated
     *
     * @param string $namespace Namespace of the interface
     * @param string $interfaceName Interface name
     * @return void
     */
    public function markGenerated(string $namespace, string $interfaceName): void
    {
        $key = $namespace . '\\' . $interfaceName;
        $this->generatedInterfaces[$key] = true;
    }

    /**
     * Get list of generated interfaces
     *
     * @return array Array of fully qualified interface names
     */
    public function getGeneratedInterfaces(): array
    {
        return array_keys($this->generatedInterfaces);
    }
}
