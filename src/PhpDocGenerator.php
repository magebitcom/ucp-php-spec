<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

use Nette\PhpGenerator\PhpNamespace;

/**
 * Generates PHPDoc type annotations for interface methods
 */
class PhpDocGenerator
{
    private SchemaParser $parser;
    private TypeMapper $typeMapper;

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
    }

    /**
     * Generate PHPDoc type annotation with proper array item types
     *
     * @param array $property Property schema definition
     * @param string $phpType PHP type hint
     * @param string $currentFile Current file path for resolving references
     * @param PhpNamespace $namespace Namespace for use statements
     * @param string|null $parentName Parent interface name for inline objects
     * @param string|null $propertyName Property name for inline objects
     * @return string PHPDoc type annotation (e.g., "Type[]" or "Type[]|null")
     */
    public function generatePhpDocType(
        array $property,
        string $phpType,
        string $currentFile,
        PhpNamespace $namespace,
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
                    $apType = $property['additionalProperties']['type'];
                    
                    // If additionalProperties is an array type, resolve the item type
                    if ($apType === 'array' && isset($property['additionalProperties']['items'])) {
                        $itemType = $this->typeMapper->getArrayItemType($property['additionalProperties'], $currentFile, $parentName, $propertyName);
                        
                        if ($itemType !== null && $itemType !== 'mixed') {
                            $this->addUseStatementsForType($itemType, $namespace);
                            $simplifiedItemType = $this->simplifyTypeForComment($itemType, $namespace);
                            $valueType = 'array<' . $simplifiedItemType . '>';
                        } elseif (isset($property['additionalProperties']['items']['$ref'])) {
                            // Fallback: try to resolve $ref directly if getArrayItemType didn't work
                            $itemType = $this->typeMapper->mapType($property['additionalProperties']['items'], $currentFile);
                            if ($itemType !== null && $itemType !== 'mixed' && strpos($itemType, '\\') === 0) {
                                $this->addUseStatementsForType($itemType, $namespace);
                                $simplifiedItemType = $this->simplifyTypeForComment($itemType, $namespace);
                                $valueType = 'array<' . $simplifiedItemType . '>';
                            } else {
                                $valueType = 'array<mixed>';
                            }
                        } else {
                            $valueType = 'array<mixed>';
                        }
                    } else {
                        $valueType = $apType;
                    }
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
     * @param PhpNamespace $namespace Namespace to add use statements to
     * @return void
     */
    public function addUseStatementsForType(string $type, PhpNamespace $namespace): void
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
     * @param PhpNamespace $namespace Namespace to add use statement to
     * @return void
     */
    private function addUseStatementForSingleType(string $type, PhpNamespace $namespace): void
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
     * @param PhpNamespace $namespace Namespace for context
     * @return string Simplified type for PHPDoc
     */
    private function simplifyTypeForComment(string $type, PhpNamespace $namespace): string
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
     * @param PhpNamespace $namespace Namespace for context
     * @return string Simplified type name
     */
    private function simplifySingleTypeForComment(string $type, PhpNamespace $namespace): string
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
}
