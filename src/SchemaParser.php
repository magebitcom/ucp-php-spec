<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Parses JSON Schema files and resolves $ref references
 */
class SchemaParser
{
    public const ROOT_NAMESPACE = 'Magebit\\UcpSpec';
    public const API_NAMESPACE = self::ROOT_NAMESPACE . '\\Api';
    public const DATA_NAMESPACE = self::ROOT_NAMESPACE . '\\Data';

    /**
     * Directory names that say nothing once the type already lives under the Api namespace.
     */
    private const IGNORED_PATH_SEGMENTS = ['schemas'];

    /**
     * UCP writes the operation variant into the file name; it is what separates the four
     * otherwise identical `checkout` definitions the extension schemas each declare.
     */
    private const VARIANTS = [
        'create_req' => 'CreateRequest',
        'update_req' => 'UpdateRequest',
        'complete_req' => 'CompleteRequest',
        'resp' => 'Response',
        'req' => 'Request',
    ];

    private array $loadedSchemas = [];
    private string $baseDir;

    /**
     * @param string $baseDir Base directory for schema files
     */
    public function __construct(string $baseDir)
    {
        $this->baseDir = rtrim((string)(realpath($baseDir) ?: $baseDir), '/');
    }

    /**
     * @param string $filePath Path to the schema file
     * @return array The loaded schema
     * @throws \RuntimeException If the file is missing or not valid JSON
     */
    public function loadSchema(string $filePath): array
    {
        $absolutePath = $this->resolveFilePath($filePath);

        if (isset($this->loadedSchemas[$absolutePath])) {
            return $this->loadedSchemas[$absolutePath];
        }

        if (!file_exists($absolutePath)) {
            throw new \RuntimeException("Schema file not found: {$absolutePath}");
        }

        $schema = json_decode((string)file_get_contents($absolutePath), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Invalid JSON in {$absolutePath}: " . json_last_error_msg());
        }

        if (!is_array($schema)) {
            throw new \RuntimeException("Schema is not an object: {$absolutePath}");
        }

        $this->loadedSchemas[$absolutePath] = $schema;

        return $schema;
    }

    /**
     * @param string $ref Reference string, e.g. "#/$defs/Item" or "schema.cart.json#/$defs/Cart"
     * @param string $currentFile File the reference appears in
     * @return array The resolved schema fragment
     * @throws \RuntimeException If the reference cannot be resolved
     */
    public function resolveRef(string $ref, string $currentFile): array
    {
        if (strpos($ref, '#') === 0) {
            return $this->resolveJsonPointer($ref, $currentFile);
        }

        $pointer = explode('#', $ref, 2)[1] ?? '';

        return $this->resolveJsonPointer('#' . $pointer, $this->resolveRefFile($ref, $currentFile));
    }

    /**
     * Follow a $ref, including chained bare-$ref aliases, to the schema it ultimately points at.
     *
     * @param string $ref Reference string
     * @param string $currentFile File the reference appears in
     * @return array{schema: array, file: string} Resolved schema and the file that owns it
     * @throws \RuntimeException If the reference cannot be resolved or loops
     */
    public function resolveRefTarget(string $ref, string $currentFile): array
    {
        $seen = [];

        while (true) {
            $key = $currentFile . '|' . $ref;

            if (isset($seen[$key])) {
                throw new \RuntimeException("Circular reference: {$ref} in {$currentFile}");
            }

            $seen[$key] = true;
            $schema = $this->resolveRef($ref, $currentFile);
            $currentFile = $this->resolveRefFile($ref, $currentFile);

            if (!$this->isRefAlias($schema)) {
                return ['schema' => $schema, 'file' => $currentFile];
            }

            $ref = $schema['$ref'];
        }
    }

    /**
     * A schema that is nothing but a $ref (plus annotations) is an alias for its target.
     *
     * @param array $schema Schema fragment
     * @return bool
     */
    public function isRefAlias(array $schema): bool
    {
        if (!isset($schema['$ref'])) {
            return false;
        }

        return !isset($schema['properties'])
            && !isset($schema['allOf'])
            && !isset($schema['oneOf'])
            && !isset($schema['anyOf'])
            && !isset($schema['type']);
    }

    /**
     * @param string $filePath Path to the schema file
     * @return array Definitions from $defs or definitions
     */
    public function getDefinitions(string $filePath): array
    {
        $schema = $this->loadSchema($filePath);

        return $schema['$defs'] ?? $schema['definitions'] ?? [];
    }

    /**
     * Most UCP files declare exactly one type at the root; the extension schemas declare a family
     * of `$defs` instead and have no root of their own.
     *
     * @param string $filePath Path to the schema file
     * @return bool
     */
    public function hasRootObject(string $filePath): bool
    {
        $schema = $this->loadSchema($filePath);

        if (($schema['type'] ?? null) === 'object') {
            return true;
        }

        return isset($schema['oneOf']) || isset($schema['anyOf']) || isset($schema['allOf']);
    }

    /**
     * @param string $filePath Path to the schema file
     * @return array
     */
    public function getRootSchema(string $filePath): array
    {
        return $this->loadSchema($filePath);
    }

    /**
     * @param string $directory Directory to search
     * @return string[] Absolute file paths, sorted for reproducible output
     */
    public function findSchemaFiles(string $directory): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            // Normalised here so paths from iteration and from $ref resolution compare equal.
            if ($file->isFile() && $file->getExtension() === 'json') {
                $files[] = (string)realpath($file->getPathname());
            }
        }

        sort($files, SORT_STRING);

        return $files;
    }

    /**
     * The file name carries both the concept and the operation variant, which together are unique
     * across the spec — so it, not the schema title, is what every generated name is built from.
     *
     * @param string $filePath Path to the schema file
     * @return string Type prefix in PascalCase, e.g. "CheckoutResponse"
     */
    public function getTypePrefix(string $filePath): string
    {
        [$concept, $variant] = $this->splitVariant(basename($filePath, '.json'));

        return $this->toPascalCase($concept) . $variant;
    }

    /**
     * @param string $filePath Path to the schema file
     * @return string Concept in PascalCase, without the variant, e.g. "Checkout"
     */
    public function getConceptName(string $filePath): string
    {
        return $this->toPascalCase($this->splitVariant(basename($filePath, '.json'))[0]);
    }

    /**
     * Namespaces mirror the spec's own directory layout, which is what keeps the two `fulfillment_resp`
     * files — one under `shopping/`, one under `shopping/types/` — from naming the same type twice.
     *
     * @param string $filePath Path to the schema file
     * @return string Fully qualified namespace, e.g. "Magebit\UcpSpec\Api\Shopping\Types"
     */
    public function getNamespaceFromPath(string $filePath): string
    {
        return $this->namespaceFor(self::API_NAMESPACE, $filePath);
    }

    /**
     * @param string $filePath Path to the schema file
     * @return string Fully qualified DTO namespace, e.g. "Magebit\UcpSpec\Data\Shopping\Types"
     */
    public function getDataNamespaceFromPath(string $filePath): string
    {
        return $this->namespaceFor(self::DATA_NAMESPACE, $filePath);
    }

    /**
     * @param string $defName Definition name as written in $defs
     * @param string $filePath Path to the schema file
     * @return string Type name without the Interface suffix
     */
    public function definitionTypeName(string $defName, string $filePath): string
    {
        $prefix = $this->getTypePrefix($filePath);
        $name = $this->toPascalCase($this->stripReverseDomain($defName));

        // A definition named after its own file adds nothing: `fulfillment_resp.json#/$defs/fulfillment`
        // is the fulfillment response, not a `FulfillmentResponseFulfillment`.
        return $name === $this->getConceptName($filePath) ? $prefix : $prefix . $name;
    }

    /**
     * An extension binds onto a base concept under that concept's reverse-domain name, so
     * `dev.ucp.shopping.checkout` is the checkout it composes onto. Only the concept carries meaning;
     * the domain is the same for every definition in the spec and would bloat every composed name.
     *
     * @param string $defName Definition name as written in $defs
     * @return string
     */
    private function stripReverseDomain(string $defName): string
    {
        return preg_match('/^dev\.ucp\.[a-z0-9_]+\.([a-z0-9_]+)$/', $defName, $matches) === 1
            ? $matches[1]
            : $defName;
    }

    /**
     * @param array $schema The schema array
     * @param string $filePath Path to the schema file
     * @return string
     */
    public function getInterfaceName(array $schema, string $filePath): string
    {
        return $this->getTypePrefix($filePath);
    }

    /**
     * @param string $name Raw name
     * @return string
     */
    public function toPascalCase(string $name): string
    {
        $name = (string)preg_replace('/[^A-Za-z0-9]+/', ' ', $name);

        return str_replace(' ', '', ucwords($name));
    }

    /**
     * @param string $root Root namespace to hang the path under
     * @param string $filePath Path to the schema file
     * @return string
     */
    private function namespaceFor(string $root, string $filePath): string
    {
        $parts = [$root];

        foreach (explode('/', dirname($this->relativePath($filePath))) as $segment) {
            if ($segment === '' || $segment === '.' || in_array($segment, self::IGNORED_PATH_SEGMENTS, true)) {
                continue;
            }

            $parts[] = $this->toPascalCase($segment);
        }

        return implode('\\', $parts);
    }

    /**
     * @param string $filePath Absolute or relative path to a schema file
     * @return string Path relative to the spec directory
     */
    private function relativePath(string $filePath): string
    {
        $absolute = (string)(realpath($this->resolveFilePath($filePath)) ?: $filePath);

        if (strpos($absolute, $this->baseDir . '/') === 0) {
            return substr($absolute, strlen($this->baseDir) + 1);
        }

        return basename($absolute);
    }

    /**
     * @param string $base File name without its extension
     * @return array{0: string, 1: string} Concept and the PascalCase variant, which may be empty
     */
    private function splitVariant(string $base): array
    {
        if (str_contains($base, '.')) {
            [$concept, $suffix] = explode('.', $base, 2);

            return isset(self::VARIANTS[$suffix]) ? [$concept, self::VARIANTS[$suffix]] : [$base, ''];
        }

        // Only `_resp`/`_req` are variants; `message_error` and `embedded_config` are whole concepts.
        if (preg_match('/^(.+)_(resp|req)$/', $base, $matches) === 1) {
            return [$matches[1], self::VARIANTS[$matches[2]]];
        }

        return [$base, ''];
    }

    /**
     * @param string $filePath Relative or absolute file path
     * @return string
     */
    private function resolveFilePath(string $filePath): string
    {
        if (strpos($filePath, '/') === 0) {
            return $filePath;
        }

        return $this->baseDir . '/' . $filePath;
    }

    /**
     * @param string $pointer JSON pointer, e.g. "#/$defs/Item"
     * @param string $filePath File containing the schema
     * @return array
     * @throws \RuntimeException If the pointer cannot be resolved
     */
    private function resolveJsonPointer(string $pointer, string $filePath): array
    {
        $schema = $this->loadSchema($filePath);

        if ($pointer === '#' || $pointer === '') {
            return $schema;
        }

        $current = $schema;

        foreach (explode('/', ltrim($pointer, '#/')) as $part) {
            $part = str_replace(['~1', '~0'], ['/', '~'], $part);

            if (!is_array($current) || !isset($current[$part])) {
                throw new \RuntimeException("Cannot resolve pointer {$pointer} in {$filePath}");
            }

            $current = $current[$part];
        }

        if (!is_array($current)) {
            throw new \RuntimeException("Pointer {$pointer} in {$filePath} does not resolve to a schema");
        }

        return $current;
    }

    /**
     * @param string $ref Reference string
     * @param string $currentFile File the reference appears in
     * @return string Absolute path of the target file
     * @throws \RuntimeException If the target file cannot be located
     */
    private function resolveRefFile(string $ref, string $currentFile): string
    {
        if (strpos($ref, '#') === 0) {
            return $currentFile;
        }

        [$filePath] = explode('#', $ref, 2);
        $targetFile = realpath(
            strpos($filePath, '/') === 0 ? $filePath : dirname($currentFile) . '/' . $filePath
        );

        if ($targetFile === false) {
            throw new \RuntimeException("Cannot resolve reference: {$ref} from {$currentFile}");
        }

        return $targetFile;
    }
}
