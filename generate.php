#!/usr/bin/env php
<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

// Load Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Magebit\UcpSpecGenerator\Generator;

// Define directories
$specDir = __DIR__ . '/spec';
$outputDir = __DIR__ . '/generated';

// Parse command line arguments
$options = getopt('', ['clean', 'help']);

if (isset($options['help'])) {
    echo "UCP Spec Generator\n";
    echo "==================\n\n";
    echo "Usage: php generate.php [options]\n\n";
    echo "Options:\n";
    echo "  --clean    Clean output directory before generation\n";
    echo "  --help     Show this help message\n\n";
    echo "Description:\n";
    echo "  Generates PHP interfaces from JSON Schema files in the spec/ directory.\n";
    echo "  Output is saved to the generated/ directory.\n\n";
    exit(0);
}

try {
    // Create generator instance
    $generator = new Generator($specDir, $outputDir);

    // Clean output directory if requested
    if (isset($options['clean'])) {
        $generator->cleanOutputDirectory();
    }

    // Generate interfaces
    $generator->generate();

    echo "\n✓ Success!\n";
    exit(0);

} catch (\Exception $e) {
    echo "\n✗ Error: " . $e->getMessage() . "\n";
    echo "\nStack trace:\n";
    echo $e->getTraceAsString() . "\n";
    exit(1);
}
