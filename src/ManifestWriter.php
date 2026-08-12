<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator;

/**
 * Writes spec.manifest.json recording the provenance of the vendored spec snapshot
 */
class ManifestWriter
{
    public const GENERATOR_VERSION = '1.2.0';
    public const MANIFEST_FILENAME = 'spec.manifest.json';

    /**
     * Build the manifest payload for a set of input schema files.
     *
     * @param string $specDir Directory the schema files live in
     * @param string[] $schemaFiles Absolute paths of every input schema file
     * @return array The manifest as a nested array
     * @throws \RuntimeException If a schema file cannot be hashed
     */
    public function build(string $specDir, array $schemaFiles): array
    {
        $specDir = rtrim($specDir, '/');
        $files = [];

        foreach ($schemaFiles as $file) {
            $hash = hash_file('sha256', $file);

            if ($hash === false) {
                throw new \RuntimeException("Cannot hash schema file: {$file}");
            }

            $relative = ltrim(substr($file, strlen($specDir)), '/');
            $files[$relative] = 'sha256:' . $hash;
        }

        ksort($files, SORT_STRING);

        $extra = $this->readUcpExtra();
        $upstream = is_array($extra['upstream'] ?? null) ? $extra['upstream'] : [];
        $target = $extra['spec-target'] ?? null;

        return [
            'generator' => [
                'name' => 'magebitcom/ucp-php-spec',
                'version' => self::GENERATOR_VERSION,
            ],
            'upstream' => [
                'repository' => $upstream['repository'] ?? null,
                'ref' => $upstream['ref'] ?? null,
                'commit' => $upstream['commit'] ?? null,
            ],
            'spec' => [
                'target' => is_string($target) ? $target : null,
                'directory' => 'spec',
                'file_count' => count($files),
                'files' => $files,
            ],
        ];
    }

    /**
     * composer.json is the single source of truth for the spec target and its provenance, so the
     * manifest cannot drift from what the release workflow validates.
     *
     * @return array
     * @throws \RuntimeException
     */
    private function readUcpExtra(): array
    {
        $path = dirname(__DIR__) . '/composer.json';
        $raw = file_get_contents($path);

        if ($raw === false) {
            throw new \RuntimeException("Cannot read {$path}");
        }

        $composer = json_decode($raw, true);

        if (!is_array($composer)) {
            throw new \RuntimeException("Cannot decode {$path}");
        }

        $extra = $composer['extra']['ucp'] ?? null;

        return is_array($extra) ? $extra : [];
    }

    /**
     * Encode the manifest deterministically (stable key order, trailing newline)
     *
     * @param array $manifest Manifest payload
     * @return string JSON document
     * @throws \RuntimeException If encoding fails
     */
    public function encode(array $manifest): string
    {
        $json = json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        if ($json === false) {
            throw new \RuntimeException('Cannot encode manifest: ' . json_last_error_msg());
        }

        return $json . "\n";
    }

    /**
     * Write the manifest next to the generated tree.
     *
     * @param string $targetDir Directory to write spec.manifest.json into
     * @param array $manifest Manifest payload
     * @return string Path of the written file
     * @throws \RuntimeException If the file cannot be written
     */
    public function write(string $targetDir, array $manifest): string
    {
        $path = rtrim($targetDir, '/') . '/' . self::MANIFEST_FILENAME;

        if (file_put_contents($path, $this->encode($manifest)) === false) {
            throw new \RuntimeException("Cannot write manifest: {$path}");
        }

        return $path;
    }
}
