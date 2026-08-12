<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Byte-compares two generated trees, used by the --check drift gate
 */
class DirectoryComparator
{
    /**
     * Compare two directories recursively.
     *
     * @param string $expected Directory holding the committed output
     * @param string $actual Directory holding the freshly generated output
     * @return string[] Human readable differences, empty when the trees are identical
     */
    public function compare(string $expected, string $actual): array
    {
        $expectedFiles = $this->hashTree($expected);
        $actualFiles = $this->hashTree($actual);

        $differences = [];

        foreach (array_diff_key($expectedFiles, $actualFiles) as $path => $hash) {
            $differences[] = "removed: {$path}";
        }

        foreach (array_diff_key($actualFiles, $expectedFiles) as $path => $hash) {
            $differences[] = "added: {$path}";
        }

        foreach (array_intersect_key($expectedFiles, $actualFiles) as $path => $hash) {
            if ($actualFiles[$path] !== $hash) {
                $differences[] = "changed: {$path}";
            }
        }

        sort($differences, SORT_STRING);

        return $differences;
    }

    /**
     * Hash every file in a tree, keyed by path relative to the tree root
     *
     * @param string $directory Directory to hash
     * @return array<string, string> Map of relative path to SHA-256
     */
    private function hashTree(string $directory): array
    {
        $directory = rtrim($directory, '/');

        if (!is_dir($directory)) {
            return [];
        }

        $hashes = [];
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (!$file->isFile()) {
                continue;
            }

            $relative = ltrim(substr($file->getPathname(), strlen($directory)), '/');
            $hashes[$relative] = (string)hash_file('sha256', $file->getPathname());
        }

        ksort($hashes, SORT_STRING);

        return $hashes;
    }
}
