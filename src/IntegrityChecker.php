<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Verifies that every generated type referenced by the emitted code is itself emitted
 */
class IntegrityChecker
{
    private const ROOT_NAMESPACE = 'Magebit\\UcpSpec\\';

    private array $declared = [];
    private array $references = [];

    /**
     * Scan a generated tree and return the references that resolve to nothing.
     *
     * @param string $generatedDir Directory containing the generated PHP files
     * @return array<string, string[]> Map of dangling FQN to the files referencing it
     * @throws \RuntimeException If the directory does not exist
     */
    public function findDanglingReferences(string $generatedDir): array
    {
        if (!is_dir($generatedDir)) {
            throw new \RuntimeException("Generated directory not found: {$generatedDir}");
        }

        $this->declared = [];
        $this->references = [];

        foreach ($this->findPhpFiles($generatedDir) as $file) {
            $this->scanFile($file, $generatedDir);
        }

        $dangling = [];

        foreach ($this->references as $fqn => $sources) {
            if (!isset($this->declared[$fqn])) {
                $sources = array_values(array_unique($sources));
                sort($sources, SORT_STRING);
                $dangling[$fqn] = $sources;
            }
        }

        ksort($dangling, SORT_STRING);

        return $dangling;
    }

    /**
     * Types declared by the last scan
     *
     * @return string[] Fully qualified names, sorted
     */
    public function getDeclaredTypes(): array
    {
        $declared = array_keys($this->declared);
        sort($declared, SORT_STRING);

        return $declared;
    }

    /**
     * Collect declarations and references from a single generated file
     *
     * @param string $file Absolute path to the PHP file
     * @param string $generatedDir Root of the generated tree, for readable source labels
     * @return void
     */
    private function scanFile(string $file, string $generatedDir): void
    {
        $source = file_get_contents($file);

        if ($source === false) {
            throw new \RuntimeException("Cannot read generated file: {$file}");
        }

        $label = ltrim(substr($file, strlen(rtrim($generatedDir, '/'))), '/');

        $namespace = '';
        if (preg_match('/^namespace\s+([^;]+);/m', $source, $m)) {
            $namespace = trim($m[1]);
        }

        if (preg_match('/^(?:interface|class|enum|trait)\s+(\w+)/m', $source, $m)) {
            $this->declared[$this->join($namespace, $m[1])] = true;
        }

        $aliases = [];
        if (preg_match_all('/^use\s+([^;]+);/m', $source, $matches)) {
            foreach ($matches[1] as $import) {
                [$fqn, $alias] = $this->splitImport($import);
                $aliases[$alias] = $fqn;
                $this->addReference($fqn, $label);
            }
        }

        // Docblocks carry fully qualified names even for same-namespace types.
        if (preg_match_all('/\\\\(' . preg_quote(self::ROOT_NAMESPACE, '/') . '[A-Za-z0-9_\\\\]+)/', $source, $matches)) {
            foreach ($matches[1] as $fqn) {
                $this->addReference(rtrim($fqn, '\\'), $label);
            }
        }

        // Signatures use short names; resolve them against the imports and the file namespace.
        if (preg_match_all('/\b([A-Z]\w*Interface)\b/', $source, $matches)) {
            foreach ($matches[1] as $shortName) {
                $this->addReference($aliases[$shortName] ?? $this->join($namespace, $shortName), $label);
            }
        }
    }

    /**
     * Split a use statement into its FQN and the local name it binds
     *
     * @param string $import Import body without the use keyword and semicolon
     * @return array{0: string, 1: string} FQN and local alias
     */
    private function splitImport(string $import): array
    {
        $import = trim($import);

        if (preg_match('/^(.+?)\s+as\s+(\w+)$/i', $import, $m)) {
            return [ltrim(trim($m[1]), '\\'), $m[2]];
        }

        $fqn = ltrim($import, '\\');
        $parts = explode('\\', $fqn);

        return [$fqn, (string)end($parts)];
    }

    /**
     * Record a reference, ignoring anything outside the generated root namespace
     *
     * @param string $fqn Fully qualified name
     * @param string $source File the reference was found in
     * @return void
     */
    private function addReference(string $fqn, string $source): void
    {
        $fqn = trim($fqn, '\\');

        if (strpos($fqn, self::ROOT_NAMESPACE) !== 0) {
            return;
        }

        $this->references[$fqn][] = $source;
    }

    /**
     * Join a namespace and a short name into an FQN
     *
     * @param string $namespace Namespace, possibly empty
     * @param string $name Short type name
     * @return string Fully qualified name
     */
    private function join(string $namespace, string $name): string
    {
        $namespace = trim($namespace, '\\');

        return $namespace === '' ? $name : $namespace . '\\' . $name;
    }

    /**
     * List every PHP file under a directory, in a stable order
     *
     * @param string $directory Directory to scan
     * @return string[] Absolute file paths, sorted
     */
    private function findPhpFiles(string $directory): array
    {
        $files = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $files[] = $file->getPathname();
            }
        }

        sort($files, SORT_STRING);

        return $files;
    }
}
