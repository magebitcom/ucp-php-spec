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
    private bool $generateSetters = false;
    private string $namespaceBase = 'Api';

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
     * Set whether to generate setter methods
     *
     * @param bool $generateSetters True to generate setters
     * @return void
     */
    public function setGenerateSetters(bool $generateSetters): void
    {
        $this->generateSetters = $generateSetters;
    }

    /**
     * Set namespace base
     *
     * @param string $namespaceBase Namespace base ('Api' or 'MutableApi')
     * @return void
     */
    public function setNamespaceBase(string $namespaceBase): void
    {
        $this->namespaceBase = $namespaceBase;
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
        // Append "Interface" suffix if not already present
        if (!str_ends_with($interfaceName, 'Interface')) {
            $interfaceName .= 'Interface';
        }
        
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

        // Resolve allOf/oneOf/anyOf to get merged properties
        $mergedSchema = $this->resolveCompositeSchema($schema, $currentFile);

        // Add properties as getter methods
        if (isset($mergedSchema['properties'])) {
            $this->addProperties($interface, $mergedSchema, $currentFile, $ns);
        }

        return $file;
    }

    /**
     * Resolve composite schemas (allOf/oneOf/anyOf) to get merged properties
     *
     * @param array $schema Schema definition
     * @param string $currentFile Current file path for resolving references
     * @return array Merged schema with properties
     */
    private function resolveCompositeSchema(array $schema, string $currentFile): array
    {
        $merged = $schema;

        // Handle allOf - merge all schemas
        if (isset($schema['allOf'])) {
            foreach ($schema['allOf'] as $subSchema) {
                // Resolve $ref if present
                if (isset($subSchema['$ref'])) {
                    $resolved = $this->parser->resolveRef($subSchema['$ref'], $currentFile);
                    $subSchema = $this->resolveCompositeSchema($resolved, $currentFile);
                }

                // Merge properties
                if (isset($subSchema['properties'])) {
                    if (!isset($merged['properties'])) {
                        $merged['properties'] = [];
                    }
                    $merged['properties'] = array_merge($merged['properties'], $subSchema['properties']);
                }

                // Merge required
                if (isset($subSchema['required'])) {
                    if (!isset($merged['required'])) {
                        $merged['required'] = [];
                    }
                    $merged['required'] = array_merge($merged['required'], $subSchema['required']);
                }
            }
        }

        // Handle oneOf/anyOf - just use the first one for now (could be improved)
        if (isset($schema['oneOf']) && !isset($merged['properties'])) {
            $first = $schema['oneOf'][0];
            if (isset($first['$ref'])) {
                $resolved = $this->parser->resolveRef($first['$ref'], $currentFile);
                $merged = array_merge($merged, $this->resolveCompositeSchema($resolved, $currentFile));
            } elseif (isset($first['properties'])) {
                $merged['properties'] = $first['properties'];
            }
        }

        if (isset($schema['anyOf']) && !isset($merged['properties'])) {
            $first = $schema['anyOf'][0];
            if (isset($first['$ref'])) {
                $resolved = $this->parser->resolveRef($first['$ref'], $currentFile);
                $merged = array_merge($merged, $this->resolveCompositeSchema($resolved, $currentFile));
            } elseif (isset($first['properties'])) {
                $merged['properties'] = $first['properties'];
            }
        }

        return $merged;
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

        // First, add key constants for all properties
        foreach ($properties as $propertyName => $property) {
            $this->addKeyConstant($interface, $propertyName);
        }

        // Then add enum constants for all properties with enum values
        foreach ($properties as $propertyName => $property) {
            $this->addEnumConstants($interface, $propertyName, $property, $currentFile);
        }

        // Then add getter methods
        foreach ($properties as $propertyName => $property) {
            $this->addPropertyMethod($interface, $propertyName, $property, $required, $currentFile, $namespace);
        }

        // Add setter methods if enabled
        if ($this->generateSetters) {
            foreach ($properties as $propertyName => $property) {
                $this->addSetterMethod($interface, $propertyName, $property, $required, $currentFile, $namespace);
            }
        }
    }

    /**
     * Add key constant for a property
     *
     * @param InterfaceType $interface Interface to add constant to
     * @param string $propertyName Name of the property
     * @return void
     */
    private function addKeyConstant(
        InterfaceType $interface,
        string $propertyName
    ): void {
        // Convert property name to KEY_* format (UPPER_SNAKE_CASE)
        $constantName = 'KEY_' . $this->toUpperSnakeCase($propertyName);
        
        // Value is the property name in snake_case
        $constantValue = $this->toSnakeCase($propertyName);
        
        // Add the constant
        $interface->addConstant($constantName, $constantValue)
            ->setPublic();
    }

    /**
     * Add enum constants for a property if it has enum values
     *
     * @param InterfaceType $interface Interface to add constants to
     * @param string $propertyName Name of the property
     * @param array $property Property schema definition
     * @param string $currentFile Current file path for resolving references
     * @return void
     */
    private function addEnumConstants(
        InterfaceType $interface,
        string $propertyName,
        array $property,
        string $currentFile
    ): void {
        // Resolve $ref if present
        $resolvedProperty = $property;
        if (isset($property['$ref'])) {
            try {
                $resolvedProperty = $this->parser->resolveRef($property['$ref'], $currentFile);
            } catch (\Exception $e) {
                // If resolution fails, use original property
                return;
            }
        }

        // Check if property has enum values
        if (!isset($resolvedProperty['enum']) || !is_array($resolvedProperty['enum'])) {
            return;
        }

        // Generate constant name prefix from property name
        $prefix = strtoupper(preg_replace('/([a-z])([A-Z])/', '$1_$2', $propertyName));
        $prefix = strtoupper(str_replace(['-', '.'], '_', $prefix));

        // Add a constant for each enum value
        foreach ($resolvedProperty['enum'] as $enumValue) {
            // Generate constant name from enum value
            $constantSuffix = strtoupper(str_replace(['-', '.', ' '], '_', $enumValue));
            $constantName = $prefix . '_' . $constantSuffix;

            // Add the constant
            $interface->addConstant($constantName, $enumValue)
                ->setPublic();
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
        $method->setPublic();

        // Add description
        if (isset($property['description'])) {
            $method->addComment($property['description']);
            $method->addComment('');
        }

        // Get parent interface name from the interface
        $parentName = $interface->getName();

        // Map type with context for inline objects
        $phpType = $this->typeMapper->mapType($property, $currentFile, $parentName, $propertyName);
        
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
        $commentType = $this->generatePhpDocType($property, $phpType, $currentFile, $namespace, $parentName, $propertyName);
        $method->addComment('@return ' . $commentType);
    }

    /**
     * Add a single property as setter method
     *
     * @param InterfaceType $interface Interface to add method to
     * @param string $propertyName Name of the property
     * @param array $property Property schema definition
     * @param array $required Array of required property names
     * @param string $currentFile Current file path for resolving references
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace for use statements
     * @return void
     */
    private function addSetterMethod(
        InterfaceType $interface,
        string $propertyName,
        array $property,
        array $required,
        string $currentFile,
        \Nette\PhpGenerator\PhpNamespace $namespace
    ): void {
        // Convert property name to setter method name
        $methodName = 'set' . $this->toPascalCase($propertyName);

        $method = $interface->addMethod($methodName);
        $method->setPublic();

        // Add description
        if (isset($property['description'])) {
            $method->addComment($property['description']);
            $method->addComment('');
        }

        // Get parent interface name from the interface
        $parentName = $interface->getName();

        // Map type with context for inline objects
        $phpType = $this->typeMapper->mapType($property, $currentFile, $parentName, $propertyName);
        
        // Handle nullable types
        $isRequired = in_array($propertyName, $required);
        $isNullable = false;
        
        if (!$isRequired && $phpType !== 'mixed' && $phpType !== 'null') {
            $isNullable = true;
            // For PHPDoc, keep the union syntax
            if (strpos($phpType, '|') === false) {
                $phpType .= '|null';
            } elseif (strpos($phpType, 'null') === false) {
                $phpType .= '|null';
            }
        }

        // Add use statements for all referenced types
        $this->addUseStatementsForType($phpType, $namespace);

        // Generate PHPDoc type with array item types
        $commentType = $this->generatePhpDocType($property, $phpType, $currentFile, $namespace, $parentName, $propertyName);

        // Convert property name to camelCase for parameter
        $paramName = $this->typeMapper->toCamelCase($propertyName);
        
        // Add parameter with camelCase name
        $param = $method->addParameter($paramName);
        
        // Set parameter type using ?Type syntax for nullable types
        if ($phpType !== 'mixed') {
            if ($isNullable) {
                // Remove |null from the type string for parameter type hint
                $paramType = str_replace(['|null', 'null|'], '', $phpType);
                $param->setType($paramType);
                $param->setNullable(true);
            } else {
                $param->setType($phpType);
            }
        }
        
        $method->addComment('@param ' . $commentType . ' $' . $paramName);

        // Set return type to self for method chaining
        $method->setReturnType('self');
        $method->addComment('@return self');
    }

    /**
     * Generate PHPDoc type annotation with proper array item types
     *
     * @param array $property Property schema definition
     * @param string $phpType PHP type hint
     * @param string $currentFile Current file path for resolving references
     * @param \Nette\PhpGenerator\PhpNamespace $namespace Namespace for use statements
     * @param string|null $parentName Parent interface name for inline objects
     * @param string|null $propertyName Property name for inline objects
     * @return string PHPDoc type annotation (e.g., "Type[]" or "Type[]|null")
     */
    private function generatePhpDocType(
        array $property,
        string $phpType,
        string $currentFile,
        \Nette\PhpGenerator\PhpNamespace $namespace,
        ?string $parentName = null,
        ?string $propertyName = null
    ): string {
        // Resolve $ref if present
        if (isset($property['$ref'])) {
            try {
                $property = $this->parser->resolveRef($property['$ref'], $currentFile);
            } catch (\Exception $e) {
                // If resolution fails, continue with original property
            }
        }
        
        // Check if property is an array type
        $propertyType = $property['type'] ?? null;
        
        // If phpType is already an interface type (starts with \) and property has properties,
        // it's an inline object interface - use the interface type directly
        if (strpos($phpType, '\\') === 0 && isset($property['properties'])) {
            // It's an inline object that was mapped to an interface FQN
            $this->addUseStatementsForType($phpType, $namespace);
            return $this->simplifyTypeForComment($phpType, $namespace);
        }
        
        // Check if we're dealing with an array with items
        if ($propertyType === 'array' && isset($property['items'])) {
            $itemType = $this->typeMapper->getArrayItemType($property, $currentFile, $parentName, $propertyName);
            
            if ($itemType !== null && $itemType !== 'mixed') {
                // Add use statement for item type
                $this->addUseStatementsForType($itemType, $namespace);
                
                // Simplify item type for PHPDoc
                $simplifiedItemType = $this->simplifyTypeForComment($itemType, $namespace);
                
                // Check if this is a nested array (array of arrays)
                $itemsSchema = $property['items'];
                if (isset($itemsSchema['type']) && $itemsSchema['type'] === 'array' && isset($itemsSchema['items'])) {
                    // Nested array - check inner array's item type
                    $innerItemType = $this->typeMapper->getArrayItemType($itemsSchema, $currentFile, $parentName, $propertyName);
                    
                    if ($innerItemType !== null && $innerItemType !== 'mixed') {
                        // Inner array has known item type
                        $this->addUseStatementsForType($innerItemType, $namespace);
                        $simplifiedInnerType = $this->simplifyTypeForComment($innerItemType, $namespace);
                        
                        // Handle nullable arrays
                        if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                            return 'array<array<' . $simplifiedInnerType . '>>|null';
                        }
                        return 'array<array<' . $simplifiedInnerType . '>>';
                    }
                    
                    // Inner array item type is unknown - use array<array<mixed>>
                    if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                        return 'array<array<mixed>>|null';
                    }
                    return 'array<array<mixed>>';
                }
                
                // Handle nullable arrays
                if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                    return $simplifiedItemType . '[]|null';
                }
                
                return $simplifiedItemType . '[]';
            }
            
            // Item type is unknown or mixed - use array<mixed>
            if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                return 'array<mixed>|null';
            }
            return 'array<mixed>';
        }
        
        // Check if we're dealing with an object with additionalProperties (map/dictionary)
        // Only treat as dictionary if it has additionalProperties AND no properties defined
        // Objects with properties are inline objects that should have interfaces, not dictionaries
        $hasProperties = isset($property['properties']) && 
                        is_array($property['properties']) && 
                        count($property['properties']) > 0;
        
        if ($propertyType === 'object' && 
            isset($property['additionalProperties']) && 
            !$hasProperties) {
            $valueType = null;
            
            // Check if additionalProperties is a boolean (true = any type allowed = mixed)
            if (is_bool($property['additionalProperties'])) {
                // additionalProperties: true means any value type (mixed)
                $valueType = 'mixed';
            } elseif (is_array($property['additionalProperties'])) {
                // If additionalProperties has a $ref, resolve it
                if (isset($property['additionalProperties']['$ref'])) {
                    $valueType = $this->typeMapper->mapType($property['additionalProperties'], $currentFile);
                    $this->addUseStatementsForType($valueType, $namespace);
                    $valueType = $this->simplifyTypeForComment($valueType, $namespace);
                } elseif (isset($property['additionalProperties']['type'])) {
                    $valueType = $property['additionalProperties']['type'];
                }
            }
            
            if ($valueType !== null && $valueType !== 'mixed') {
                // Handle nullable objects
                if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                    return 'array<string, ' . $valueType . '>|null';
                }
                return 'array<string, ' . $valueType . '>';
            }
            
            // Value type is unknown or mixed - use array<mixed>
            if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                return 'array<mixed>|null';
            }
            return 'array<mixed>';
        }
        
        // Check if phpType is array but we don't have array items info
        // This could be a dictionary/map that was converted to array
        // Only apply if property doesn't have properties (which would be an inline object interface)
        if ($phpType === 'array' && 
            $propertyType !== 'array' && 
            !isset($property['items']) && 
            !isset($property['properties'])) {
            // This is likely a dictionary/map that was converted to array
            if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                return 'array<mixed>|null';
            }
            return 'array<mixed>';
        }

        // For arrays without item type information, use array<mixed>
        $baseType = str_replace(['|null', 'null|'], '', $phpType);
        if ($baseType === 'array') {
            if (strpos($phpType, '|null') !== false || strpos($phpType, 'null|') !== false) {
                return 'array<mixed>|null';
            }
            return 'array<mixed>';
        }
        
        // For non-array types, simplify normally
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

        // If it's a fully qualified name (starts with \), return it as-is (FQN)
        if (strpos($type, '\\') === 0) {
            return $type;
        }

        return $type;
    }

    /**
     * Build interface for a $defs definition
     *
     * @param string $interfaceName Full interface name (may include file prefix)
     * @param array $definition Definition schema
     * @param string $namespace Namespace for the interface
     * @param string $currentFile Current file path for resolving references
     * @return PhpFile Generated PHP file
     */
    public function buildDefinitionInterface(
        string $interfaceName,
        array $definition,
        string $namespace,
        string $currentFile
    ): PhpFile {
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
     * Convert any case to snake_case
     *
     * @param string $name Name in any case
     * @return string Name in snake_case
     */
    private function toSnakeCase(string $name): string
    {
        // If already in snake_case or contains underscores, normalize it
        if (strpos($name, '_') !== false || strpos($name, '-') !== false) {
            $name = str_replace(['-', '.'], '_', $name);
            return strtolower($name);
        }
        
        // Convert camelCase/PascalCase to snake_case
        $name = preg_replace('/([a-z])([A-Z])/', '$1_$2', $name);
        return strtolower($name);
    }

    /**
     * Convert any case to UPPER_SNAKE_CASE
     *
     * @param string $name Name in any case
     * @return string Name in UPPER_SNAKE_CASE
     */
    private function toUpperSnakeCase(string $name): string
    {
        return strtoupper($this->toSnakeCase($name));
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
