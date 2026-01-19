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
    private array $loadedSchemas = [];
    private string $baseDir;

    /**
     * Constructor
     *
     * @param string $baseDir Base directory for schema files
     */
    public function __construct(string $baseDir)
    {
        $this->baseDir = rtrim($baseDir, '/');
    }

    /**
     * Load a schema file and resolve all references
     *
     * @param string $filePath Path to the schema file
     * @return array The loaded schema
     * @throws \RuntimeException If file not found or invalid JSON
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

        $content = file_get_contents($absolutePath);
        $schema = json_decode($content, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Invalid JSON in {$absolutePath}: " . json_last_error_msg());
        }

        $this->loadedSchemas[$absolutePath] = $schema;

        return $schema;
    }

    /**
     * Resolve a $ref reference
     *
     * @param string $ref The reference string (e.g., "#/$defs/version" or "../ucp.json#/$defs/version")
     * @param string $currentFile Current file path for resolving relative references
     * @return array The resolved schema
     * @throws \RuntimeException If reference cannot be resolved
     */
    public function resolveRef(string $ref, string $currentFile): array
    {
        // Split reference into file path and JSON pointer
        if (strpos($ref, '#') === 0) {
            // Internal reference (e.g., #/$defs/version)
            return $this->resolveJsonPointer($ref, $currentFile);
        }

        // External reference (e.g., ../ucp.json#/$defs/version)
        [$filePath, $pointer] = explode('#', $ref, 2);
        $pointer = '#' . ($pointer ?? '');

        // Resolve relative file path
        $currentDir = dirname($currentFile);
        $targetFile = realpath($currentDir . '/' . $filePath);

        if (!$targetFile) {
            throw new \RuntimeException("Cannot resolve reference: {$ref} from {$currentFile}");
        }

        return $this->resolveJsonPointer($pointer, $targetFile);
    }

    /**
     * Resolve a JSON pointer within a schema
     *
     * @param string $pointer JSON pointer (e.g., "#/$defs/version")
     * @param string $filePath File path containing the schema
     * @return array The resolved schema fragment
     * @throws \RuntimeException If pointer cannot be resolved
     */
    private function resolveJsonPointer(string $pointer, string $filePath): array
    {
        $schema = $this->loadSchema($filePath);

        if ($pointer === '#' || $pointer === '') {
            return $schema;
        }

        // Remove leading #/
        $pointer = ltrim($pointer, '#/');
        $parts = explode('/', $pointer);

        $current = $schema;
        foreach ($parts as $part) {
            // Decode JSON pointer escapes
            $part = str_replace(['~1', '~0'], ['/', '~'], $part);

            if (!isset($current[$part])) {
                throw new \RuntimeException("Cannot resolve pointer {$pointer} in {$filePath}");
            }

            $current = $current[$part];
        }

        return $current;
    }

    /**
     * Get all schema definitions from a file
     *
     * @param string $filePath Path to the schema file
     * @return array Array of definitions from $defs or definitions key
     */
    public function getDefinitions(string $filePath): array
    {
        $schema = $this->loadSchema($filePath);
        return $schema['$defs'] ?? $schema['definitions'] ?? [];
    }

    /**
     * Check if schema has a root object definition
     *
     * @param string $filePath Path to the schema file
     * @return bool True if schema has type: "object"
     */
    public function hasRootObject(string $filePath): bool
    {
        $schema = $this->loadSchema($filePath);
        return isset($schema['type']) && $schema['type'] === 'object';
    }

    /**
     * Get the root schema object
     *
     * @param string $filePath Path to the schema file
     * @return array The root schema
     */
    public function getRootSchema(string $filePath): array
    {
        return $this->loadSchema($filePath);
    }

    /**
     * Resolve file path to absolute path
     *
     * @param string $filePath Relative or absolute file path
     * @return string Absolute file path
     */
    private function resolveFilePath(string $filePath): string
    {
        if (strpos($filePath, '/') === 0) {
            return $filePath;
        }

        return $this->baseDir . '/' . $filePath;
    }

    /**
     * Find all JSON schema files in a directory
     *
     * @param string $directory Directory to search
     * @return array Array of file paths
     */
    public function findSchemaFiles(string $directory): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'json') {
                $files[] = $file->getPathname();
            }
        }

        return $files;
    }

    /**
     * Extract interface name from schema title or filename
     *
     * @param array $schema The schema array
     * @param string $filePath Path to the schema file
     * @return string Sanitized interface name
     */
    public function getInterfaceName(array $schema, string $filePath): string
    {
        // Use title if available
        if (isset($schema['title'])) {
            return $this->sanitizeInterfaceName($schema['title']);
        }

        // Use filename
        $filename = basename($filePath, '.json');
        return $this->sanitizeInterfaceName($filename);
    }

    /**
     * Sanitize a string to be a valid PHP interface name
     *
     * @param string $name Raw name to sanitize
     * @return string Valid PHP interface name in PascalCase
     */
    private function sanitizeInterfaceName(string $name): string
    {
        // Remove common suffixes
        $name = preg_replace('/\.(create_req|update_req|resp)$/', '', $name);
        
        // Convert to PascalCase
        $name = str_replace(['-', '_', '.', ' '], ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);

        return $name;
    }

    /**
     * Get namespace from file path
     *
     * @param string $filePath Path to the schema file
     * @return string Fully qualified namespace (e.g., "Magebit\UcpSpec\Shopping")
     */
    public function getNamespaceFromPath(string $filePath): string
    {
        // Remove base directory and file name
        $relativePath = str_replace($this->baseDir . '/', '', $filePath);
        $relativePath = dirname($relativePath);

        // Remove 'spec/schemas/' prefix if present
        $relativePath = preg_replace('#^spec/schemas/?#', '', $relativePath);

        if ($relativePath === '.' || $relativePath === '') {
            return 'Magebit\\UcpSpec';
        }

        // Convert path to namespace
        $parts = explode('/', $relativePath);
        $parts = array_map('ucfirst', $parts);
        
        return 'Magebit\\UcpSpec\\' . implode('\\', $parts);
    }
}
