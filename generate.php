#!/usr/bin/env php
<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Magebit\UcpSpecGenerator\DirectoryComparator;
use Magebit\UcpSpecGenerator\Generator;
use Magebit\UcpSpecGenerator\IntegrityChecker;
use Magebit\UcpSpecGenerator\ManifestWriter;

const ROOT_DIR = __DIR__;
const SPEC_DIR = __DIR__ . '/spec';
const OUTPUT_DIR = __DIR__ . '/generated';
const RUNTIME_DIR = __DIR__ . '/runtime';

$options = getopt('', ['clean', 'check', 'help']);

if (isset($options['help'])) {
    echo "UCP Spec Generator\n";
    echo "==================\n\n";
    echo "Usage: php generate.php [options]\n\n";
    echo "Options:\n";
    echo "  --clean    Clean output directory before generation\n";
    echo "  --check    Regenerate into a temp directory and fail if the committed output differs\n";
    echo "  --help     Show this help message\n\n";
    echo "Description:\n";
    echo "  Generates PHP interfaces from JSON Schema files in the spec/ directory.\n";
    echo "  Output is saved to the generated/ directory, alongside spec.manifest.json.\n";
    echo "  Exits non-zero on any generation error, dangling type reference or drift.\n\n";
    exit(0);
}

/**
 * Run the generator, then gate the result on integrity and report any recorded failures.
 *
 * @param string $outputDir Directory to write interfaces into
 * @param string $manifestDir Directory to write spec.manifest.json into
 * @param bool $clean Whether to wipe the output directory first
 * @return array{generator: Generator, failures: string[]} Generator and blocking failures
 */
function runGeneration(string $outputDir, string $manifestDir, bool $clean): array
{
    $generator = new Generator(SPEC_DIR, $outputDir);

    if ($clean) {
        $generator->cleanOutputDirectory();
    }

    $generator->generate();

    $manifestWriter = new ManifestWriter();
    $manifestWriter->write($manifestDir, $manifestWriter->build(SPEC_DIR, $generator->getSchemaFiles()));

    $failures = $generator->getErrors();

    $dangling = (new IntegrityChecker())->findDanglingReferences($outputDir, RUNTIME_DIR);

    foreach ($dangling as $fqn => $sources) {
        $failures[] = "Referenced but never generated: {$fqn} (from " . implode(', ', $sources) . ')';
    }

    return ['generator' => $generator, 'failures' => $failures];
}

/**
 * Print the collision warnings a run produced.
 *
 * @param Generator $generator Generator that just ran
 * @return void
 */
function reportCollisions(Generator $generator): void
{
    $collisions = $generator->getCollisions();

    if ($collisions === []) {
        return;
    }

    echo "\nName collisions (last source wins, see README):\n";

    foreach ($collisions as $fqn => $sources) {
        echo "  ! {$fqn} also produced by " . implode(', ', array_unique($sources)) . "\n";
    }
}

/**
 * Delete a directory tree.
 *
 * @param string $dir Directory to remove
 * @return void
 */
function removeDirectory(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }

    foreach (array_diff(scandir($dir) ?: [], ['.', '..']) as $entry) {
        $path = $dir . '/' . $entry;
        is_dir($path) ? removeDirectory($path) : unlink($path);
    }

    rmdir($dir);
}

try {
    if (isset($options['check'])) {
        $tempDir = sys_get_temp_dir() . '/ucp-spec-check-' . bin2hex(random_bytes(6));
        mkdir($tempDir . '/generated', 0755, true);

        $result = runGeneration($tempDir . '/generated', $tempDir, true);

        $committedManifest = ROOT_DIR . '/' . ManifestWriter::MANIFEST_FILENAME;
        $differences = (new DirectoryComparator())->compare(OUTPUT_DIR, $tempDir . '/generated');

        if (!file_exists($committedManifest)
            || hash_file('sha256', $committedManifest)
                !== hash_file('sha256', $tempDir . '/' . ManifestWriter::MANIFEST_FILENAME)) {
            $differences[] = 'changed: ' . ManifestWriter::MANIFEST_FILENAME;
        }

        removeDirectory($tempDir);

        reportCollisions($result['generator']);

        if ($result['failures'] !== []) {
            echo "\n✗ Generation failed:\n";
            foreach ($result['failures'] as $failure) {
                echo "  - {$failure}\n";
            }
            exit(1);
        }

        if ($differences !== []) {
            echo "\n✗ Committed output is stale. Run: php generate.php --clean\n";
            foreach ($differences as $difference) {
                echo "  - {$difference}\n";
            }
            exit(1);
        }

        echo "\n✓ Committed output is up to date.\n";
        exit(0);
    }

    $result = runGeneration(OUTPUT_DIR, ROOT_DIR, isset($options['clean']));

    reportCollisions($result['generator']);

    if ($result['failures'] !== []) {
        echo "\n✗ Generation failed:\n";
        foreach ($result['failures'] as $failure) {
            echo "  - {$failure}\n";
        }
        exit(1);
    }

    echo "\n✓ Success!\n";
    exit(0);

} catch (\Throwable $e) {
    echo "\n✗ Error: " . $e->getMessage() . "\n";
    echo "\nStack trace:\n";
    echo $e->getTraceAsString() . "\n";
    exit(1);
}
