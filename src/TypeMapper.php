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
    private const SCALARS = [
        'string' => 'string',
        'integer' => 'int',
        'number' => 'float',
        'boolean' => 'bool',
        'null' => 'null',
        'array' => 'array',
        'object' => 'object',
    ];

    private SchemaParser $parser;

    /**
     * @param SchemaParser $parser Schema parser instance
     */
    public function __construct(SchemaParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param array $property Property schema definition
     * @param string $currentFile File the property is declared in
     * @param string|null $parentName Parent interface name, for inline objects
     * @param string|null $propertyName Property name, for inline objects
     * @return string PHP type: a scalar, "array", or an interface FQN
     */
    public function mapType(
        array $property,
        string $currentFile,
        ?string $parentName = null,
        ?string $propertyName = null
    ): string {
        if (isset($property['$ref'])) {
            return $this->resolveRefType($property['$ref'], $currentFile);
        }

        // Checked before allOf: an array stays an array whatever the composition says. `totals.json`
        // composes only `contains`/`minContains` cardinality rules, and following those as if they
        // described the type yields mixed.
        if (($property['type'] ?? null) === 'array') {
            return 'array';
        }

        if (isset($property['allOf'])) {
            return $this->mapType($property['allOf'][0], $currentFile, $parentName, $propertyName);
        }

        if (isset($property['oneOf']) || isset($property['anyOf'])) {
            return $this->mapUnionType($property['oneOf'] ?? $property['anyOf'], $currentFile);
        }

        // A const with no declared type still pins the PHP type: the spec uses it as a discriminator.
        if (!isset($property['type']) && array_key_exists('const', $property)) {
            return $this->mapLiteralType($property['const']);
        }

        if (isset($property['enum']) && !isset($property['type'])) {
            return $this->mapEnumType($property['enum']);
        }

        if (is_array($property['type'] ?? null)) {
            return $this->mapMultipleTypes($property['type']);
        }

        return match ($property['type'] ?? 'mixed') {
            'string' => 'string',
            'integer' => 'int',
            'number' => 'float',
            'boolean' => 'bool',
            'null' => 'null',
            'array' => 'array',
            'object' => $this->mapObjectType($property, $currentFile, $parentName, $propertyName),
            default => 'mixed',
        };
    }

    /**
     * @param array $property Property schema definition with an "items" key
     * @param string $currentFile File the property is declared in
     * @param string|null $parentName Parent interface name, for inline objects
     * @param string|null $propertyName Property name, for inline objects
     * @return string|null Item type, or null when the array has no declared items
     */
    public function getArrayItemType(
        array $property,
        string $currentFile,
        ?string $parentName = null,
        ?string $propertyName = null
    ): ?string {
        // A property may reach the array through a reference, in which case the item type is declared
        // on the referenced schema rather than here.
        if (!isset($property['items']) && isset($property['$ref'])) {
            try {
                $target = $this->parser->resolveRefTarget($property['$ref'], $currentFile);
            } catch (\RuntimeException) {
                return null;
            }

            return isset($target['schema']['items'])
                ? $this->getArrayItemType($target['schema'], $target['file'], $parentName, $propertyName)
                : null;
        }

        if (!isset($property['items'])) {
            return null;
        }

        return $this->mapType(
            $property['items'],
            $currentFile,
            $parentName,
            $propertyName !== null ? $propertyName . '_item' : null
        );
    }

    /**
     * @param string $propertyName Name of the property
     * @param array $schema Schema containing a "required" array
     * @return bool
     */
    public function isRequired(string $propertyName, array $schema): bool
    {
        return in_array($propertyName, $schema['required'] ?? [], true);
    }

    /**
     * Shared by the interface and the DTO so a getter and its implementation cannot disagree
     * about whether a field may be absent.
     *
     * @param string $propertyName Name of the property
     * @param string $baseType Mapped PHP type
     * @param string[] $required Required property names
     * @return bool
     */
    public function isNullable(string $propertyName, string $baseType, array $required): bool
    {
        if (in_array($propertyName, $required, true)) {
            return false;
        }

        // "mixed", and any union that already lists null, admit absence on their own; widening them
        // again produces the redundant "string|null|null" PHP rejects outright.
        return $baseType !== 'mixed' && !in_array('null', explode('|', $baseType), true);
    }

    /**
     * @param array $property Property schema definition
     * @return bool True when the property is an inline object needing its own interface
     */
    public function isInlineObject(array $property): bool
    {
        return ($property['type'] ?? null) === 'object'
            && isset($property['properties'])
            && is_array($property['properties'])
            && $property['properties'] !== [];
    }

    /**
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @return string
     */
    public function generateInlineInterfaceName(string $parentName, string $propertyName): string
    {
        $parent = str_ends_with($parentName, 'Interface') ? substr($parentName, 0, -9) : $parentName;

        return $parent . $this->parser->toPascalCase($propertyName) . 'Interface';
    }

    /**
     * @param string $namespace Namespace for the interface
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @return string
     */
    public function generateInlineInterfaceFQN(string $namespace, string $parentName, string $propertyName): string
    {
        return '\\' . $namespace . '\\' . $this->generateInlineInterfaceName($parentName, $propertyName);
    }

    /**
     * @param string $name Name in any case
     * @return string
     */
    public function toCamelCase(string $name): string
    {
        return lcfirst($this->parser->toPascalCase($name));
    }

    /**
     * @param string $name Name in any case
     * @return string
     */
    public function toPascalCase(string $name): string
    {
        return $this->parser->toPascalCase($name);
    }

    /**
     * @param array $property Property schema definition
     * @return string|null
     */
    public function getDescription(array $property): ?string
    {
        return $property['description'] ?? null;
    }

    /**
     * @param string $defName Definition name as written in $defs
     * @param string $filePath File the definition lives in
     * @return string
     */
    public function definitionInterfaceName(string $defName, string $filePath): string
    {
        $name = $this->parser->definitionTypeName($defName, $filePath);

        return str_ends_with($name, 'Interface') ? $name : $name . 'Interface';
    }

    /**
     * @param array $property Property schema definition
     * @param string $currentFile File the property is declared in
     * @param string|null $parentName Parent interface name
     * @param string|null $propertyName Property name
     * @return string
     */
    private function mapObjectType(
        array $property,
        string $currentFile,
        ?string $parentName = null,
        ?string $propertyName = null
    ): string {
        $hasProperties = isset($property['properties'])
            && is_array($property['properties'])
            && $property['properties'] !== [];

        if ($hasProperties && $parentName !== null && $propertyName !== null) {
            return $this->generateInlineInterfaceFQN(
                $this->parser->getNamespaceFromPath($currentFile),
                $parentName,
                $propertyName
            );
        }

        // An object with no declared properties is a free-form map, which PHP models as an array.
        return $hasProperties ? 'object' : 'array';
    }

    /**
     * @param string $ref Reference string
     * @param string $currentFile File the reference appears in
     * @return string Interface FQN with a leading backslash, or a scalar type
     */
    private function resolveRefType(string $ref, string $currentFile): string
    {
        try {
            $target = $this->parser->resolveRefTarget($ref, $currentFile);
        } catch (\RuntimeException $e) {
            return 'mixed';
        }

        $schema = $target['schema'];

        if (!$this->isInterfaceWorthy($schema)) {
            return $this->mapType($schema, $target['file']);
        }

        $defName = $this->refDefinitionName($ref);
        $name = $defName === null
            ? $this->parser->getInterfaceName($schema, $target['file']) . 'Interface'
            : $this->definitionInterfaceName($defName, $target['file']);

        return '\\' . $this->parser->getNamespaceFromPath($target['file']) . '\\' . $name;
    }

    /**
     * Only shapes with named members become interfaces; enums, scalars and free-form maps stay values.
     *
     * @param array $schema Resolved schema fragment
     * @return bool
     */
    private function isInterfaceWorthy(array $schema): bool
    {
        // An array is a list of some other type, never an interface itself. `totals.json` reaches
        // here with a root allOf that carries only `contains`/`minContains` cardinality rules, which
        // would otherwise be mistaken for object composition.
        if (($schema['type'] ?? null) === 'array') {
            return false;
        }

        if (isset($schema['properties']) && is_array($schema['properties']) && $schema['properties'] !== []) {
            return true;
        }

        return isset($schema['allOf']) || isset($schema['oneOf']) || isset($schema['anyOf']);
    }

    /**
     * @param string $ref Reference string
     * @return string|null Trailing definition name, or null when the ref points at a whole document
     */
    private function refDefinitionName(string $ref): ?string
    {
        $pointer = explode('#', $ref, 2)[1] ?? '';
        $pointer = trim($pointer, '/');

        if ($pointer === '') {
            return null;
        }

        $parts = explode('/', $pointer);

        return (string)end($parts);
    }

    /**
     * @param array $types Array of type schemas
     * @param string $currentFile File the union is declared in
     * @return string
     */
    private function mapUnionType(array $types, string $currentFile): string
    {
        $mapped = [];

        foreach ($types as $type) {
            $mapped[] = $this->mapType($type, $currentFile);
        }

        $mapped = array_values(array_unique($mapped));

        // A union that collapses to unrelated interfaces is not expressible as a useful hint.
        if (in_array('mixed', $mapped, true)) {
            return 'mixed';
        }

        return implode('|', $mapped);
    }

    /**
     * @param array $values Enum values
     * @return string
     */
    private function mapEnumType(array $values): string
    {
        $mapped = [];

        foreach ($values as $value) {
            $mapped[] = $this->mapLiteralType($value);
        }

        $mapped = array_values(array_unique($mapped));

        return $mapped === [] ? 'mixed' : implode('|', $mapped);
    }

    /**
     * @param mixed $value Literal value from const or enum
     * @return string
     */
    private function mapLiteralType(mixed $value): string
    {
        return match (true) {
            is_string($value) => 'string',
            is_bool($value) => 'bool',
            is_int($value) => 'int',
            is_float($value) => 'float',
            is_array($value) => 'array',
            $value === null => 'null',
            default => 'mixed',
        };
    }

    /**
     * @param array $types Array of JSON Schema type names
     * @return string
     */
    private function mapMultipleTypes(array $types): string
    {
        $mapped = [];

        foreach ($types as $type) {
            $mapped[] = self::SCALARS[$type] ?? 'mixed';
        }

        $mapped = array_values(array_unique($mapped));

        if (in_array('mixed', $mapped, true)) {
            return 'mixed';
        }

        return implode('|', $mapped);
    }
}
