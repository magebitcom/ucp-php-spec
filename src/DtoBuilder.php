<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;

/**
 * Builds the concrete DTO for a generated interface, so consumers implement no spec shapes by hand.
 */
class DtoBuilder
{
    public const BASE_CLASS = 'Magebit\\UcpSpec\\Runtime\\SpecObject';

    private SchemaParser $parser;
    private TypeMapper $typeMapper;
    private PhpDocGenerator $phpDocGenerator;
    private InterfaceBuilder $interfaceBuilder;
    private PsrPrinter $printer;
    private array $generated = [];

    /**
     * @param SchemaParser $parser Schema parser instance
     * @param TypeMapper $typeMapper Type mapper instance
     * @param PhpDocGenerator $phpDocGenerator PHPDoc generator instance
     * @param InterfaceBuilder $interfaceBuilder Builder sharing the schema composition rules
     */
    public function __construct(
        SchemaParser $parser,
        TypeMapper $typeMapper,
        PhpDocGenerator $phpDocGenerator,
        InterfaceBuilder $interfaceBuilder
    ) {
        $this->parser = $parser;
        $this->typeMapper = $typeMapper;
        $this->phpDocGenerator = $phpDocGenerator;
        $this->interfaceBuilder = $interfaceBuilder;
        $this->printer = new PsrPrinter();
    }

    /**
     * @param string $interfaceName Interface the DTO implements, with or without the suffix
     * @param array $schema Schema definition
     * @param string $apiNamespace Namespace of the interface
     * @param string $currentFile File the schema lives in
     * @return PhpFile
     * @throws \RuntimeException If a composed $ref cannot be resolved
     */
    public function buildDto(
        string $interfaceName,
        array $schema,
        string $apiNamespace,
        string $currentFile
    ): PhpFile {
        $file = new PhpFile();
        $file->setStrictTypes();
        $file->addComment('This file is auto-generated. Do not edit manually.');
        $file->addComment('');
        $file->addComment('@author    Magebit <info@magebit.com>');
        $file->addComment('@copyright Copyright (c) Magebit, Ltd. (https://magebit.com)');
        $file->addComment('@license   MIT');

        $ns = $file->addNamespace($this->dataNamespace($apiNamespace));
        $className = $this->className($interfaceName);
        $interfaceFqn = trim($apiNamespace, '\\') . '\\'
            . $this->interfaceBuilder->normalizeInterfaceName($interfaceName);

        $class = $ns->addClass($className);
        $ns->addUse(self::BASE_CLASS);
        $ns->addUse($interfaceFqn);
        $class->setExtends(self::BASE_CLASS);
        $class->addImplement($interfaceFqn);

        if (isset($schema['description'])) {
            $class->addComment((string)$schema['description']);
        }

        $merged = $this->interfaceBuilder->resolveCompositeSchema($schema, $currentFile);

        $this->addAccessors($class, $merged, $currentFile, $ns, $className);

        return $file;
    }

    /**
     * @param PhpFile $file PHP file to save
     * @param string $outputDir Output directory
     * @param string $apiNamespace Namespace of the interface
     * @param string $interfaceName Interface name
     * @return string Path to the saved file
     * @throws \RuntimeException If the file cannot be written
     */
    public function saveDto(PhpFile $file, string $outputDir, string $apiNamespace, string $interfaceName): string
    {
        $namespace = $this->dataNamespace($apiNamespace);
        $directory = $outputDir . '/' . str_replace('\\', '/', $namespace);

        if (!is_dir($directory) && !mkdir($directory, 0755, true) && !is_dir($directory)) {
            throw new \RuntimeException("Cannot create directory: {$directory}");
        }

        $filePath = $directory . '/' . $this->className($interfaceName) . '.php';

        if (file_put_contents($filePath, $this->printer->printFile($file)) === false) {
            throw new \RuntimeException("Cannot write DTO: {$filePath}");
        }

        $this->generated[$namespace . '\\' . $this->className($interfaceName)] = true;

        return $filePath;
    }

    /**
     * @return string[]
     */
    public function getGeneratedDtos(): array
    {
        return array_keys($this->generated);
    }

    /**
     * @param string $apiNamespace Namespace of the interface
     * @return string
     */
    public function dataNamespace(string $apiNamespace): string
    {
        $suffix = substr(trim($apiNamespace, '\\'), strlen(SchemaParser::API_NAMESPACE));

        return SchemaParser::DATA_NAMESPACE . $suffix;
    }

    /**
     * @param string $interfaceName Interface name, with or without the suffix
     * @return string
     */
    public function className(string $interfaceName): string
    {
        return str_ends_with($interfaceName, 'Interface')
            ? substr($interfaceName, 0, -9)
            : $interfaceName;
    }

    /**
     * @param ClassType $class Class to populate
     * @param array $schema Schema containing properties
     * @param string $currentFile File the schema lives in
     * @param PhpNamespace $namespace Namespace collecting use statements
     * @param string $className Name of the class being built
     * @return void
     */
    private function addAccessors(
        ClassType $class,
        array $schema,
        string $currentFile,
        PhpNamespace $namespace,
        string $className
    ): void {
        $required = $schema['required'] ?? [];
        $jsonObjectKeys = [];

        foreach ($schema['properties'] ?? [] as $propertyName => $property) {
            if (!is_array($property)) {
                continue;
            }

            $propertyName = (string)$propertyName;
            $baseType = $this->typeMapper->mapType($property, $currentFile, $className . 'Interface', $propertyName);
            $nullable = $this->typeMapper->isNullable($propertyName, $baseType, $required);

            $this->phpDocGenerator->addUseStatementsForType($baseType, $namespace);

            $docType = $this->phpDocGenerator->generatePhpDocType(
                $property,
                $baseType,
                $nullable,
                $currentFile,
                $namespace,
                $className . 'Interface',
                $propertyName
            );

            $this->addGetter($class, $propertyName, $baseType, $nullable, $docType);
            $this->addSetter($class, $propertyName, $baseType, $nullable, $docType);

            if ($this->isJsonObject($property, $baseType)) {
                $jsonObjectKeys[] = $this->toSnakeCase($propertyName);
            }
        }

        if ($jsonObjectKeys !== []) {
            $class->addProperty('jsonObjectKeys', $jsonObjectKeys)
                ->setProtected()
                ->setType('array')
                ->addComment('@var string[]');
        }
    }

    /**
     * @param ClassType $class Class to populate
     * @param string $propertyName Name of the property
     * @param string $baseType Mapped PHP type
     * @param bool $nullable Whether the property may be absent
     * @param string $docType PHPDoc type
     * @return void
     */
    private function addGetter(
        ClassType $class,
        string $propertyName,
        string $baseType,
        bool $nullable,
        string $docType
    ): void {
        $method = $class->addMethod('get' . $this->typeMapper->toPascalCase($propertyName))->setPublic();

        if ($baseType !== 'mixed') {
            $method->setReturnType($nullable ? $baseType . '|null' : $baseType);
        }

        $method->addComment('@return ' . $docType);

        // A required list that is merely absent reads better as empty than as a type error.
        $accessor = $baseType === 'array' && !$nullable ? 'getArray' : 'get';

        $method->setBody('return $this->' . $accessor . '(self::' . $this->keyConstant($propertyName) . ');');
    }

    /**
     * @param ClassType $class Class to populate
     * @param string $propertyName Name of the property
     * @param string $baseType Mapped PHP type
     * @param bool $nullable Whether the property may be absent
     * @param string $docType PHPDoc type
     * @return void
     */
    private function addSetter(
        ClassType $class,
        string $propertyName,
        string $baseType,
        bool $nullable,
        string $docType
    ): void {
        $paramName = $this->typeMapper->toCamelCase($propertyName);
        $method = $class->addMethod('set' . $this->typeMapper->toPascalCase($propertyName))->setPublic();
        $param = $method->addParameter($paramName);

        if ($baseType !== 'mixed') {
            $param->setType($nullable ? $baseType . '|null' : $baseType);
        }

        $method->setReturnType('self');
        $method->addComment('@param ' . $docType . ' $' . $paramName);
        $method->addComment('@return self');
        $method->setBody(
            'return $this->set(self::' . $this->keyConstant($propertyName) . ', $' . $paramName . ');'
        );
    }

    /**
     * @param array $property Property schema definition
     * @param string $baseType Mapped PHP type
     * @return bool True when an empty value has to encode as `{}`
     */
    private function isJsonObject(array $property, string $baseType): bool
    {
        return $baseType === 'array' && ($property['type'] ?? null) === 'object';
    }

    /**
     * @param string $propertyName Name of the property
     * @return string
     */
    private function keyConstant(string $propertyName): string
    {
        return 'KEY_' . strtoupper($this->toSnakeCase($propertyName));
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
}
