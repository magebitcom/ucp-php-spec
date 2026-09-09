<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

use Nette\PhpGenerator\InterfaceType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

/**
 * Builds PHP interfaces using nette/php-generator
 */
class InterfaceBuilder
{
    /**
     * Schema keywords a consumer can check on its own, carried onto the interface so validation does
     * not have to read the schema files at runtime. Keyword names are kept exactly as the schema
     * spells them, so a rule can be traced back to its source without a translation table.
     */
    private const CARRIED_KEYWORDS = [
        'minLength',
        'maxLength',
        'pattern',
        'format',
        'minimum',
        'maximum',
        'exclusiveMinimum',
        'exclusiveMaximum',
        'minItems',
        'maxItems',
    ];

    /**
     * Name of the constant the carried keywords are emitted under.
     */
    private const CONSTRAINTS_CONSTANT = 'CONSTRAINTS';

    /**
     * How far to follow nested lists. A list of lists is already unusual; anything deeper is a
     * schema that reaches itself, and following it forever is worse than stopping short.
     */
    private const MAX_ITEM_DEPTH = 3;

    private SchemaParser $parser;
    private TypeMapper $typeMapper;
    private PhpDocGenerator $phpDocGenerator;
    private PsrPrinter $printer;
    private array $generatedInterfaces = [];
    private array $collisions = [];
    private array $constantWarnings = [];

    /**
     * @param SchemaParser $parser Schema parser instance
     * @param TypeMapper $typeMapper Type mapper instance
     * @param PhpDocGenerator $phpDocGenerator PHPDoc generator instance
     */
    public function __construct(SchemaParser $parser, TypeMapper $typeMapper, PhpDocGenerator $phpDocGenerator)
    {
        $this->parser = $parser;
        $this->typeMapper = $typeMapper;
        $this->phpDocGenerator = $phpDocGenerator;
        $this->printer = new PsrPrinter();
    }

    /**
     * @param string $interfaceName Name of the interface to generate
     * @param array $schema Schema definition
     * @param string $namespace Namespace for the interface
     * @param string $currentFile File the schema lives in
     * @return PhpFile
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
        $interface = $ns->addInterface($this->normalizeInterfaceName($interfaceName));

        if (isset($schema['description'])) {
            $interface->addComment((string)$schema['description']);
        }

        if (isset($schema['title']) && $schema['title'] !== $interface->getName()) {
            $interface->addComment('');
            $interface->addComment('Schema: ' . $schema['title']);
        }

        $merged = $this->resolveCompositeSchema($schema, $currentFile);

        if (isset($merged['properties'])) {
            $this->addProperties($interface, $merged, $currentFile, $ns);
        }

        return $file;
    }

    /**
     * @param string $parentName Parent interface name
     * @param string $propertyName Property name
     * @param array $property Property schema definition
     * @param string $namespace Namespace for the interface
     * @param string $currentFile File the property is declared in
     * @return PhpFile
     */
    public function buildInlineObjectInterface(
        string $parentName,
        string $propertyName,
        array $property,
        string $namespace,
        string $currentFile
    ): PhpFile {
        return $this->buildInterface(
            $this->typeMapper->generateInlineInterfaceName($parentName, $propertyName),
            $property,
            $namespace,
            $currentFile
        );
    }

    /**
     * Merge allOf branches into one property set, and fall back to the first oneOf/anyOf branch
     * only when the schema declares no properties of its own.
     *
     * @param array $schema Schema definition
     * @param string $currentFile File the schema lives in
     * @return array Merged schema
     * @throws \RuntimeException If a composed $ref cannot be resolved
     */
    public function resolveCompositeSchema(array $schema, string $currentFile): array
    {
        $merged = $schema;

        foreach ($schema['allOf'] ?? [] as $subSchema) {
            if (isset($subSchema['$ref'])) {
                $target = $this->parser->resolveRefTarget($subSchema['$ref'], $currentFile);
                $subSchema = $this->rebaseRefs(
                    $this->resolveCompositeSchema($target['schema'], $target['file']),
                    $target['file'],
                    $currentFile
                );
            }

            foreach ($subSchema['properties'] ?? [] as $propName => $propValue) {
                $merged['properties'][$propName] = isset($merged['properties'][$propName])
                    ? $this->deepMerge($merged['properties'][$propName], $propValue)
                    : $propValue;
            }

            if (isset($subSchema['required'])) {
                $merged['required'] = array_merge($merged['required'] ?? [], $subSchema['required']);
            }
        }

        foreach (['oneOf', 'anyOf'] as $keyword) {
            if (!isset($schema[$keyword]) || isset($merged['properties'])) {
                continue;
            }

            $first = $schema[$keyword][0] ?? [];

            if (isset($first['$ref'])) {
                $target = $this->parser->resolveRefTarget($first['$ref'], $currentFile);
                $merged = array_merge($merged, $this->rebaseRefs(
                    $this->resolveCompositeSchema($target['schema'], $target['file']),
                    $target['file'],
                    $currentFile
                ));
            } elseif (isset($first['properties'])) {
                $merged['properties'] = $first['properties'];
            }
        }

        if (isset($merged['required'])) {
            $merged['required'] = array_values(array_unique($merged['required']));
        }

        return $merged;
    }

    /**
     * @param PhpFile $file PHP file to save
     * @param string $outputDir Output directory
     * @param string $namespace Namespace of the interface
     * @param string $interfaceName Interface name
     * @return string Path to the saved file
     * @throws \RuntimeException If the file cannot be written
     */
    public function saveInterface(PhpFile $file, string $outputDir, string $namespace, string $interfaceName): string
    {
        $directory = $outputDir . '/' . str_replace('\\', '/', $namespace);

        if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
            throw new \RuntimeException("Cannot create directory: {$directory}");
        }

        $filePath = $directory . '/' . $this->normalizeInterfaceName($interfaceName) . '.php';

        if (file_put_contents($filePath, $this->printer->printFile($file)) === false) {
            throw new \RuntimeException("Cannot write interface: {$filePath}");
        }

        return $filePath;
    }

    /**
     * A same-name hit from a different source is a name collision, not a duplicate, so it is
     * reported and still written rather than silently dropped.
     *
     * @param string $namespace Namespace of the interface
     * @param string $interfaceName Interface name, with or without the Interface suffix
     * @param string $sourceFile Schema file the interface body comes from
     * @return bool
     */
    public function isGenerated(string $namespace, string $interfaceName, string $sourceFile = ''): bool
    {
        $key = $this->dedupKey($namespace, $interfaceName);

        if (!isset($this->generatedInterfaces[$key])) {
            return false;
        }

        if ($this->generatedInterfaces[$key] !== $sourceFile) {
            $this->collisions[$key][] = $sourceFile;
            return false;
        }

        return true;
    }

    /**
     * @param string $namespace Namespace of the interface
     * @param string $interfaceName Interface name
     * @param string $sourceFile Schema file the interface body comes from
     * @return void
     */
    public function markGenerated(string $namespace, string $interfaceName, string $sourceFile = ''): void
    {
        $this->generatedInterfaces[$this->dedupKey($namespace, $interfaceName)] = $sourceFile;
    }

    /**
     * @param string $namespace Namespace of the interface
     * @param string $interfaceName Interface name
     * @return string Fully qualified, suffix-normalised key
     */
    public function dedupKey(string $namespace, string $interfaceName): string
    {
        return trim($namespace, '\\') . '\\' . $this->normalizeInterfaceName($interfaceName);
    }

    /**
     * @return string[]
     */
    public function getGeneratedInterfaces(): array
    {
        return array_keys($this->generatedInterfaces);
    }

    /**
     * @return array<string, string[]> Map of FQN to the extra sources that reused it
     */
    public function getCollisions(): array
    {
        return $this->collisions;
    }

    /**
     * Constants dropped because the same name was produced twice in one interface
     *
     * @return string[]
     */
    public function getConstantWarnings(): array
    {
        return $this->constantWarnings;
    }

    /**
     * @param string $interfaceName Interface name
     * @return string
     */
    public function normalizeInterfaceName(string $interfaceName): string
    {
        return str_ends_with($interfaceName, 'Interface') ? $interfaceName : $interfaceName . 'Interface';
    }

    /**
     * A bundle composed onto another bundle's schema carries that bundle's internal `#/$defs/...`
     * references, which mean nothing once the properties are merged into a different document.
     * Anchoring them to the file that wrote them keeps them resolvable afterwards.
     *
     * @param array $schema Schema fragment resolved from another file
     * @param string $sourceFile File the fragment was written in
     * @param string $targetFile File the fragment is being merged into
     * @return array
     */
    private function rebaseRefs(array $schema, string $sourceFile, string $targetFile): array
    {
        if ($sourceFile === $targetFile) {
            return $schema;
        }

        foreach ($schema as $key => $value) {
            if ($key === '$ref' && is_string($value) && strpos($value, '#') === 0) {
                $schema[$key] = $sourceFile . $value;
                continue;
            }

            if (is_array($value)) {
                $schema[$key] = $this->rebaseRefs($value, $sourceFile, $targetFile);
            }
        }

        return $schema;
    }

    /**
     * @param array $base Base definition
     * @param array $override Definition taking precedence
     * @return array
     */
    private function deepMerge(array $base, array $override): array
    {
        $result = $base;

        foreach ($override as $key => $value) {
            $result[$key] = is_array($value) && is_array($result[$key] ?? null)
                ? $this->deepMerge($result[$key], $value)
                : $value;
        }

        return $result;
    }

    /**
     * @param InterfaceType $interface Interface to populate
     * @param array $schema Schema containing properties
     * @param string $currentFile File the schema lives in
     * @param PhpNamespace $namespace Namespace collecting use statements
     * @return void
     */
    private function addProperties(
        InterfaceType $interface,
        array $schema,
        string $currentFile,
        PhpNamespace $namespace
    ): void {
        $properties = $schema['properties'] ?? [];
        $required = $schema['required'] ?? [];

        foreach (array_keys($properties) as $propertyName) {
            $this->addConstant($interface, 'KEY_' . $this->toUpperSnakeCase((string)$propertyName), $this->toSnakeCase((string)$propertyName));
        }

        foreach ($properties as $propertyName => $property) {
            $this->addValueConstants($interface, (string)$propertyName, $property, $currentFile);
        }

        $this->addConstraintsConstant($interface, $properties, $currentFile);

        foreach ($properties as $propertyName => $property) {
            $this->addAccessors($interface, (string)$propertyName, $property, $required, $currentFile, $namespace);
        }
    }

    /**
     * Emit one constant per enum member, and for a const the single value it pins.
     *
     * @param InterfaceType $interface Interface to populate
     * @param string $propertyName Name of the property
     * @param array $property Property schema definition
     * @param string $currentFile File the property is declared in
     * @return void
     */
    private function addValueConstants(
        InterfaceType $interface,
        string $propertyName,
        array $property,
        string $currentFile
    ): void {
        if (isset($property['$ref'])) {
            try {
                $property = $this->parser->resolveRefTarget($property['$ref'], $currentFile)['schema'];
            } catch (\RuntimeException $e) {
                return;
            }
        }

        $values = $property['enum'] ?? null;

        if ($values === null && array_key_exists('const', $property)) {
            $values = [$property['const']];
        }

        if (!is_array($values)) {
            return;
        }

        $prefix = $this->toUpperSnakeCase($propertyName);

        foreach ($values as $value) {
            if (!is_string($value)) {
                continue;
            }

            $suffix = trim((string)preg_replace('/[^A-Za-z0-9]+/', '_', $value), '_');

            if ($suffix === '') {
                continue;
            }

            $this->addConstant($interface, $prefix . '_' . strtoupper($suffix), $value);
        }
    }

    /**
     * Emit every property's carried keywords as one constant, keyed by field name. One constant
     * rather than one per rule, because a per-rule name could collide with an enum value constant.
     *
     * @param InterfaceType $interface Interface to populate
     * @param array $properties Property schema definitions, keyed by property name
     * @param string $currentFile File the properties are declared in
     * @return void
     */
    private function addConstraintsConstant(InterfaceType $interface, array $properties, string $currentFile): void
    {
        $constraints = [];

        foreach ($properties as $propertyName => $property) {
            $rules = $this->carriedKeywords($property, $currentFile);

            if ($rules !== []) {
                $constraints[$this->toSnakeCase((string)$propertyName)] = $rules;
            }
        }

        if ($constraints === []) {
            return;
        }

        $interface->addConstant(self::CONSTRAINTS_CONSTANT, $constraints)->setPublic();
    }

    /**
     * The rules one property declares, following a reference to wherever it is really defined.
     *
     * A list carries its own cardinality here. Rules on its entries are nested under `items`, which
     * is the only place they can be reported for a list of plain strings or numbers: those get no
     * interface of their own to carry them. A list of objects nests nothing, because an object
     * declares no rules at its own level — its properties' rules are on its own interface.
     *
     * @param array $property Property schema definition
     * @param string $currentFile File the property is declared in
     * @param int $depth Guards against a schema that reaches itself through its own items
     * @return array<string, scalar|array<string, scalar>> Keyword to value
     */
    private function carriedKeywords(array $property, string $currentFile, int $depth = 0): array
    {
        if (isset($property['$ref'])) {
            try {
                $resolved = $this->parser->resolveRefTarget($property['$ref'], $currentFile);
            } catch (\RuntimeException $e) {
                return [];
            }

            $property = $resolved['schema'];
            $currentFile = $resolved['file'];
        }

        $rules = [];

        foreach (self::CARRIED_KEYWORDS as $keyword) {
            $value = $property[$keyword] ?? null;

            // Booleans are draft-04's spelling of the exclusive bounds, where the limit lives in a
            // separate keyword. Nothing here declares them that way, and half a rule is worse than none.
            if (is_string($value) || is_int($value) || is_float($value)) {
                $rules[$keyword] = $value;
            }
        }

        $items = $property['items'] ?? null;

        if (!is_array($items) || $depth >= self::MAX_ITEM_DEPTH) {
            return $rules;
        }

        $itemRules = $this->carriedKeywords($items, $currentFile, $depth + 1);

        return $itemRules === [] ? $rules : $rules + ['items' => $itemRules];
    }

    /**
     * @param InterfaceType $interface Interface to populate
     * @param string $name Constant name
     * @param string $value Constant value
     * @return void
     */
    private function addConstant(InterfaceType $interface, string $name, string $value): void
    {
        $existing = $interface->getConstants()[$name] ?? null;

        if ($existing !== null) {
            if ($existing->getValue() !== $value) {
                $this->constantWarnings[] = "{$interface->getName()}::{$name} already set to "
                    . var_export($existing->getValue(), true) . ", dropped " . var_export($value, true);
            }

            return;
        }

        $interface->addConstant($name, $value)->setPublic();
    }

    /**
     * @param InterfaceType $interface Interface to populate
     * @param string $propertyName Name of the property
     * @param array $property Property schema definition
     * @param string[] $required Required property names
     * @param string $currentFile File the property is declared in
     * @param PhpNamespace $namespace Namespace collecting use statements
     * @return void
     */
    private function addAccessors(
        InterfaceType $interface,
        string $propertyName,
        array $property,
        array $required,
        string $currentFile,
        PhpNamespace $namespace
    ): void {
        $parentName = $interface->getName();
        $baseType = $this->typeMapper->mapType($property, $currentFile, $parentName, $propertyName);
        $nullable = $this->typeMapper->isNullable($propertyName, $baseType, $required);

        $this->phpDocGenerator->addUseStatementsForType($baseType, $namespace);

        $docType = $this->phpDocGenerator->generatePhpDocType(
            $property,
            $baseType,
            $nullable,
            $currentFile,
            $namespace,
            $parentName,
            $propertyName
        );

        $signatureType = $nullable ? $baseType . '|null' : $baseType;
        $description = $property['description'] ?? null;

        $getter = $interface->addMethod('get' . $this->typeMapper->toPascalCase($propertyName))->setPublic();

        if ($description !== null) {
            $getter->addComment((string)$description);
            $getter->addComment('');
        }

        if ($baseType !== 'mixed') {
            $getter->setReturnType($signatureType);
        }

        $getter->addComment('@return ' . $docType);

        $paramName = $this->typeMapper->toCamelCase($propertyName);
        $setter = $interface->addMethod('set' . $this->typeMapper->toPascalCase($propertyName))->setPublic();

        if ($description !== null) {
            $setter->addComment((string)$description);
            $setter->addComment('');
        }

        $param = $setter->addParameter($paramName);

        if ($baseType !== 'mixed') {
            // Nette turns a single nullable type into "?T" and a union into "A|B|null"; passing the
            // union through setType keeps it from producing the invalid "?A|B".
            $param->setType($signatureType);
        }

        $setter->setReturnType('self');
        $setter->addComment('@param ' . $docType . ' $' . $paramName);
        $setter->addComment('@return self');
    }

    /**
     * @param string $name Name in any case
     * @return string
     */
    private function toSnakeCase(string $name): string
    {
        if (str_contains($name, '_') || str_contains($name, '-')) {
            return strtolower(str_replace(['-', '.'], '_', $name));
        }

        return strtolower((string)preg_replace('/([a-z0-9])([A-Z])/', '$1_$2', $name));
    }

    /**
     * @param string $name Name in any case
     * @return string
     */
    private function toUpperSnakeCase(string $name): string
    {
        return strtoupper($this->toSnakeCase($name));
    }
}
