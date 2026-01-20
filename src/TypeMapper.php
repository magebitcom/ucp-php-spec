<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Maps JSON Schema types to PHP types
 */
class TypeMapper
{
    private SchemaParser $parser;

    /**
     * Constructor
     *
     * @param SchemaParser $parser Schema parser instance
     */
    public function __construct(SchemaParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Map JSON Schema type to PHP type
     *
     * @param array $property Property schema definition
     * @param string $currentFile Current file path for resolving references
     * @return string PHP type (e.g., "string", "int", "array", or FQN for objects)
     */
    public function mapType(array $property, string $currentFile): string
    {
        // Handle $ref
        if (isset($property['$ref'])) {
            return $this->resolveRefType($property['$ref'], $currentFile);
        }

        // Handle allOf (treat as the first type for simplicity)
        if (isset($property['allOf'])) {
            return $this->mapType($property['allOf'][0], $currentFile);
        }

        // Handle oneOf/anyOf as union types
        if (isset($property['oneOf']) || isset($property['anyOf'])) {
            return $this->mapUnionType($property['oneOf'] ?? $property['anyOf'], $currentFile);
        }

        // Handle enum
        if (isset($property['enum'])) {
            return $this->mapEnumType($property);
        }

        // Handle type array (multiple types)
        if (isset($property['type']) && is_array($property['type'])) {
            return $this->mapMultipleTypes($property['type']);
        }

        // Handle single type
        $type = $property['type'] ?? 'mixed';

        return match ($type) {
            'string' => 'string',
            'integer' => 'int',
            'number' => 'float',
            'boolean' => 'bool',
            'null' => 'null',
            'array' => $this->mapArrayType($property, $currentFile),
            'object' => $this->mapObjectType($property, $currentFile),
            default => 'mixed',
        };
    }

    /**
     * Map array type with items
     *
     * @param array $property Property schema definition
     * @param string $currentFile Current file path for resolving references
     * @return string Always returns 'array' (PHP doesn't support typed arrays in type hints)
     */
    private function mapArrayType(array $property, string $currentFile): string
    {
        // PHP doesn't support typed arrays in type hints, always return 'array'
        return 'array';
    }

    /**
     * Get array item type for PHPDoc
     *
     * @param array $property Property schema definition with 'items' key
     * @param string $currentFile Current file path for resolving references
     * @return string|null Item type or null if no items defined
     */
    public function getArrayItemType(array $property, string $currentFile): ?string
    {
        if (!isset($property['items'])) {
            return null;
        }

        return $this->mapType($property['items'], $currentFile);
    }

    /**
     * Map object type (inline object or reference)
     *
     * @param array $property Property schema definition
     * @param string $currentFile Current file path for resolving references
     * @return string Returns 'object'
     */
    private function mapObjectType(array $property, string $currentFile): string
    {
        // If object has properties, it needs a separate interface
        if (isset($property['properties'])) {
            // Generate a unique interface name for this inline object
            // This will be handled by the InterfaceBuilder
            return 'object';
        }

        return 'object';
    }

    /**
     * Resolve $ref to fully qualified interface name or primitive type
     *
     * @param string $ref Reference string (e.g., "#/$defs/version" or "../file.json#/$defs/version")
     * @param string $currentFile Current file path for resolving relative references
     * @return string Fully qualified interface name with leading backslash or primitive type
     */
    private function resolveRefType(string $ref, string $currentFile): string
    {
        // Resolve the actual schema to check its type
        try {
            $resolvedSchema = $this->parser->resolveRef($ref, $currentFile);
            
            // Check if it's a map/dictionary type (object with only additionalProperties)
            if (isset($resolvedSchema['type']) && 
                $resolvedSchema['type'] === 'object' && 
                isset($resolvedSchema['additionalProperties']) && 
                !isset($resolvedSchema['properties']) &&
                !isset($resolvedSchema['allOf']) &&
                !isset($resolvedSchema['oneOf']) &&
                !isset($resolvedSchema['anyOf'])) {
                return 'object';
            }
            
            // Check if it's a simple type (not an object)
            // Skip if it has allOf, oneOf, anyOf (these are complex types)
            $hasComplexType = isset($resolvedSchema['allOf']) || 
                             isset($resolvedSchema['oneOf']) || 
                             isset($resolvedSchema['anyOf']) ||
                             isset($resolvedSchema['properties']);
            
            if (!$hasComplexType && isset($resolvedSchema['type']) && $resolvedSchema['type'] !== 'object') {
                return $this->mapType($resolvedSchema, $currentFile);
            }
        } catch (\Exception $e) {
            // If resolution fails, fall back to interface name generation
        }
        
        // Parse the reference
        if (strpos($ref, '#') === 0) {
            // Internal reference - same namespace as current file
            $pointer = ltrim($ref, '#/');
            $parts = explode('/', $pointer);
            
            // Get the definition name (last part)
            $defName = end($parts);
            
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
            
            // Get namespace for current file
            $namespace = $this->parser->getNamespaceFromPath($currentFile);
            
            // Append "Interface" suffix
            if (!str_ends_with($interfaceName, 'Interface')) {
                $interfaceName .= 'Interface';
            }
            
            return '\\' . $namespace . '\\' . $interfaceName;
        }

        // External reference
        $refParts = explode('#', $ref, 2);
        $filePath = $refParts[0];
        $pointer = $refParts[1] ?? '';
        
        // Resolve file path
        $currentDir = dirname($currentFile);
        $targetFile = realpath($currentDir . '/' . $filePath);

        if (!$targetFile) {
            return 'mixed';
        }

        // Get namespace for target file
        $targetNamespace = $this->parser->getNamespaceFromPath($targetFile);

        // If pointer is empty or just #, use the root schema
        if (empty($pointer) || $pointer === '') {
            $schema = $this->parser->getRootSchema($targetFile);
            $interfaceName = $this->parser->getInterfaceName($schema, $targetFile);
            
            // Append "Interface" suffix
            if (!str_ends_with($interfaceName, 'Interface')) {
                $interfaceName .= 'Interface';
            }
            
            return '\\' . $targetNamespace . '\\' . $interfaceName;
        }

        // Get the definition name from pointer
        $pointer = ltrim($pointer, '/');
        $parts = explode('/', $pointer);
        $defName = end($parts);
        
        // Determine if we should prefix with filename
        // Only prefix if the target file has no root schema (is a "definition library")
        $hasRootSchema = $this->parser->hasRootObject($targetFile);
        
        if ($hasRootSchema) {
            // File has a root schema, so $defs are supplementary - don't prefix
            $interfaceName = $this->sanitizeInterfaceName($defName);
        } else {
            // File is a definition library - prefix to avoid conflicts
            // e.g., capability.json#/$defs/response -> CapabilityResponse
            $fileBaseName = basename($targetFile, '.json');
            $fileBaseName = $this->sanitizeInterfaceName($fileBaseName);
            $defInterfaceName = $this->sanitizeInterfaceName($defName);
            $interfaceName = $fileBaseName . $defInterfaceName;
        }

        // Append "Interface" suffix
        if (!str_ends_with($interfaceName, 'Interface')) {
            $interfaceName .= 'Interface';
        }

        return '\\' . $targetNamespace . '\\' . $interfaceName;
    }

    /**
     * Map union type (oneOf/anyOf)
     *
     * @param array $types Array of type schemas
     * @param string $currentFile Current file path for resolving references
     * @return string Union type string (e.g., "string|int")
     */
    private function mapUnionType(array $types, string $currentFile): string
    {
        $mappedTypes = [];
        
        foreach ($types as $type) {
            $mappedTypes[] = $this->mapType($type, $currentFile);
        }

        // Remove duplicates
        $mappedTypes = array_unique($mappedTypes);

        // If only one type, return it
        if (count($mappedTypes) === 1) {
            return $mappedTypes[0];
        }

        // Return union type (PHP 8.0+)
        return implode('|', $mappedTypes);
    }

    /**
     * Map enum type
     *
     * @param array $property Property schema definition with enum values
     * @return string Returns 'string' (could be enhanced to generate PHP enums)
     */
    private function mapEnumType(array $property): string
    {
        // For now, return string (could be enhanced to generate PHP enums)
        return 'string';
    }

    /**
     * Map multiple types
     *
     * @param array $types Array of type strings
     * @return string Union type string (e.g., "string|int|null")
     */
    private function mapMultipleTypes(array $types): string
    {
        $mappedTypes = [];

        foreach ($types as $type) {
            $mapped = match ($type) {
                'string' => 'string',
                'integer' => 'int',
                'number' => 'float',
                'boolean' => 'bool',
                'null' => 'null',
                'array' => 'array',
                'object' => 'object',
                default => 'mixed',
            };
            $mappedTypes[] = $mapped;
        }

        // Remove duplicates
        $mappedTypes = array_unique($mappedTypes);

        // If only one type, return it
        if (count($mappedTypes) === 1) {
            return $mappedTypes[0];
        }

        // Return union type
        return implode('|', $mappedTypes);
    }

    /**
     * Check if property is required
     *
     * @param string $propertyName Name of the property
     * @param array $schema Schema containing 'required' array
     * @return bool True if property is in required array
     */
    public function isRequired(string $propertyName, array $schema): bool
    {
        return isset($schema['required']) && in_array($propertyName, $schema['required']);
    }

    /**
     * Convert snake_case to camelCase
     *
     * @param string $name Name in snake_case
     * @return string Name in camelCase
     */
    public function toCamelCase(string $name): string
    {
        // Convert snake_case to camelCase
        $name = str_replace(['-', '_', '.'], ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        
        // Make first character lowercase for camelCase
        return lcfirst($name);
    }
    
    /**
     * Convert snake_case to PascalCase
     *
     * @param string $name Name in snake_case
     * @return string Name in PascalCase
     */
    public function toPascalCase(string $name): string
    {
        // Convert snake_case to PascalCase
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
        
        // Use toPascalCase for consistent conversion
        return $this->toPascalCase($name);
    }

    /**
     * Get property description from schema
     *
     * @param array $property Property schema definition
     * @return string|null Description or null if not set
     */
    public function getDescription(array $property): ?string
    {
        return $property['description'] ?? null;
    }

    /**
     * Check if property is an inline object that needs a separate interface
     *
     * @param array $property Property schema definition
     * @return bool True if property is an inline object with properties
     */
    public function isInlineObject(array $property): bool
    {
        return isset($property['type']) 
            && $property['type'] === 'object' 
            && isset($property['properties']);
    }

    /**
     * Generate interface name for inline object
     *
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @return string Generated interface name (e.g., "ParentPropertyName")
     */
    public function generateInlineInterfaceName(string $parentName, string $propertyName): string
    {
        // Remove "Interface" suffix from parent name if present
        $parentNameWithoutSuffix = $parentName;
        if (str_ends_with($parentName, 'Interface')) {
            $parentNameWithoutSuffix = substr($parentName, 0, -9); // Remove "Interface"
        }
        
        // Clean up property name and convert to PascalCase
        $cleanPropertyName = $this->toPascalCase($propertyName);
        
        // Combine and add "Interface" suffix
        return $parentNameWithoutSuffix . $cleanPropertyName . 'Interface';
    }

    /**
     * Generate fully qualified interface name for inline object
     *
     * @param string $namespace Namespace for the interface
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @return string Fully qualified interface name with leading backslash
     */
    public function generateInlineInterfaceFQN(string $namespace, string $parentName, string $propertyName): string
    {
        $interfaceName = $this->generateInlineInterfaceName($parentName, $propertyName);
        return '\\' . $namespace . '\\' . $interfaceName;
    }
}
