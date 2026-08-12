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
    private const BUILT_INS = ['string', 'int', 'float', 'bool', 'array', 'object', 'mixed', 'null', 'void', 'self'];

    private SchemaParser $parser;
    private TypeMapper $typeMapper;

    /**
     * @param SchemaParser $parser Schema parser instance
     * @param TypeMapper $typeMapper Type mapper instance
     */
    public function __construct(SchemaParser $parser, TypeMapper $typeMapper)
    {
        $this->parser = $parser;
        $this->typeMapper = $typeMapper;
    }

    /**
     * @param array $property Property schema definition
     * @param string $baseType PHP type without any null member
     * @param bool $nullable Whether the property is optional
     * @param string $currentFile File the property is declared in
     * @param PhpNamespace $namespace Namespace collecting use statements
     * @param string|null $parentName Parent interface name, for inline objects
     * @param string|null $propertyName Property name, for inline objects
     * @return string PHPDoc type, e.g. "ItemInterface[]|null"
     */
    public function generatePhpDocType(
        array $property,
        string $baseType,
        bool $nullable,
        string $currentFile,
        PhpNamespace $namespace,
        ?string $parentName = null,
        ?string $propertyName = null
    ): string {
        $docType = $this->describe($property, $baseType, $currentFile, $namespace, $parentName, $propertyName);

        if ($nullable && $docType !== 'mixed' && !str_contains($docType, 'null')) {
            $docType .= '|null';
        }

        return $docType;
    }

    /**
     * @param string $type Type declaration, possibly a union
     * @param PhpNamespace $namespace Namespace to add use statements to
     * @return void
     */
    public function addUseStatementsForType(string $type, PhpNamespace $namespace): void
    {
        foreach (explode('|', $type) as $singleType) {
            $singleType = trim($singleType);

            if (in_array($singleType, self::BUILT_INS, true) || strpos($singleType, '\\') !== 0) {
                continue;
            }

            $fqn = ltrim($singleType, '\\');
            $separator = strrpos($fqn, '\\');

            if ($separator === false || substr($fqn, 0, $separator) === $namespace->getName()) {
                continue;
            }

            $namespace->addUse($fqn);
        }
    }

    /**
     * @param array $property Property schema definition
     * @param string $baseType PHP type without any null member
     * @param string $currentFile File the property is declared in
     * @param PhpNamespace $namespace Namespace collecting use statements
     * @param string|null $parentName Parent interface name
     * @param string|null $propertyName Property name
     * @return string
     */
    private function describe(
        array $property,
        string $baseType,
        string $currentFile,
        PhpNamespace $namespace,
        ?string $parentName,
        ?string $propertyName
    ): string {
        if (isset($property['$ref'])) {
            try {
                $target = $this->parser->resolveRefTarget($property['$ref'], $currentFile);
                $property = $target['schema'];
                $currentFile = $target['file'];
            } catch (\RuntimeException $e) {
                return $baseType;
            }
        }

        if (($property['type'] ?? null) === 'array') {
            return $this->describeArray($property, $currentFile, $namespace, $parentName, $propertyName);
        }

        if ($this->isFreeFormMap($property)) {
            return $this->describeMap($property, $currentFile, $namespace);
        }

        // An interface type already carries everything the docblock can say.
        if ($baseType === 'array') {
            return 'array<mixed>';
        }

        return $baseType;
    }

    /**
     * @param array $property Array property schema
     * @param string $currentFile File the property is declared in
     * @param PhpNamespace $namespace Namespace collecting use statements
     * @param string|null $parentName Parent interface name
     * @param string|null $propertyName Property name
     * @return string
     */
    private function describeArray(
        array $property,
        string $currentFile,
        PhpNamespace $namespace,
        ?string $parentName,
        ?string $propertyName
    ): string {
        $itemType = $this->typeMapper->getArrayItemType($property, $currentFile, $parentName, $propertyName);

        if ($itemType === null || $itemType === 'mixed') {
            return 'array<mixed>';
        }

        $items = $property['items'];

        if (($items['type'] ?? null) === 'array') {
            return 'array<' . $this->describeArray($items, $currentFile, $namespace, $parentName, $propertyName) . '>';
        }

        $this->addUseStatementsForType($itemType, $namespace);

        // "A|B[]" reads as "A or B[]", so a union item type has to be wrapped.
        return str_contains($itemType, '|') ? 'array<' . $itemType . '>' : $itemType . '[]';
    }

    /**
     * @param array $property Map property schema
     * @param string $currentFile File the property is declared in
     * @param PhpNamespace $namespace Namespace collecting use statements
     * @return string
     */
    private function describeMap(array $property, string $currentFile, PhpNamespace $namespace): string
    {
        $additional = $property['additionalProperties'];

        if (!is_array($additional)) {
            return 'array<string, mixed>';
        }

        $valueType = $this->typeMapper->mapType($additional, $currentFile);

        if ($valueType === 'mixed') {
            return 'array<string, mixed>';
        }

        if (($additional['type'] ?? null) === 'array') {
            $valueType = $this->describeArray($additional, $currentFile, $namespace, null, null);
        } else {
            $this->addUseStatementsForType($valueType, $namespace);
        }

        return 'array<string, ' . $valueType . '>';
    }

    /**
     * @param array $property Property schema definition
     * @return bool True when the property is a keyed map rather than a fixed shape
     */
    private function isFreeFormMap(array $property): bool
    {
        if (($property['type'] ?? null) !== 'object' || !isset($property['additionalProperties'])) {
            return false;
        }

        return !isset($property['properties'])
            || !is_array($property['properties'])
            || $property['properties'] === [];
    }
}
