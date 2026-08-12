<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

use Magebit\UcpSpecGenerator\ManifestWriter;
use PHPUnit\Framework\TestCase;

/**
 * Covers the provenance manifest emitted alongside generated/
 */
class ManifestWriterTest extends TestCase
{
    use TempDirectoryTrait;

    /**
     * @return void
     */
    public function testHashesEveryInputAndCarriesProvenanceFromComposer(): void
    {
        $specDir = $this->makeTempDir();
        mkdir($specDir . '/types');
        file_put_contents($specDir . '/ucp.json', '{"a":1}');
        file_put_contents($specDir . '/types/buyer.json', '{"b":2}');

        $manifest = (new ManifestWriter())->build(
            $specDir,
            [$specDir . '/types/buyer.json', $specDir . '/ucp.json']
        );

        $this->assertSame(['types/buyer.json', 'ucp.json'], array_keys($manifest['spec']['files']));
        $this->assertSame('sha256:' . hash('sha256', '{"a":1}'), $manifest['spec']['files']['ucp.json']);
        $this->assertSame(2, $manifest['spec']['file_count']);
        // Provenance is read from composer.json, the same file the release workflow validates
        // against, so a manifest that disagrees with it cannot be produced.
        $this->assertMatchesRegularExpression('/^[0-9a-f]{40}$/', $manifest['upstream']['commit']);
        $this->assertNotNull($manifest['upstream']['repository']);
        $this->assertNotNull($manifest['upstream']['ref']);
        $composer = json_decode((string) file_get_contents(dirname(__DIR__) . '/composer.json'), true);
        $this->assertSame($composer['extra']['ucp']['spec-target'], $manifest['spec']['target']);
    }

    /**
     * @return void
     */
    public function testEncodingIsStableRegardlessOfInputOrder(): void
    {
        $specDir = $this->makeTempDir();
        file_put_contents($specDir . '/a.json', '{}');
        file_put_contents($specDir . '/b.json', '{}');

        $writer = new ManifestWriter();
        $forward = $writer->encode($writer->build($specDir, [$specDir . '/a.json', $specDir . '/b.json']));
        $reversed = $writer->encode($writer->build($specDir, [$specDir . '/b.json', $specDir . '/a.json']));

        $this->assertSame($forward, $reversed);
    }

    /**
     * @return void
     */
    public function testWritesManifestNextToTheGeneratedTree(): void
    {
        $specDir = $this->makeTempDir();
        file_put_contents($specDir . '/a.json', '{}');
        $target = $this->makeTempDir();

        $writer = new ManifestWriter();
        $path = $writer->write($target, $writer->build($specDir, [$specDir . '/a.json']));

        $this->assertSame($target . '/spec.manifest.json', $path);
        $this->assertSame(
            ManifestWriter::GENERATOR_VERSION,
            json_decode((string)file_get_contents($path), true)['generator']['version']
        );
    }
}
