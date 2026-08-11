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
    public function testHashesEveryInputAndLeavesUnknownProvenanceNull(): void
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
        $this->assertNull($manifest['upstream']['ref']);
        $this->assertNull($manifest['upstream']['commit']);
        $this->assertNull($manifest['upstream']['repository']);
        $this->assertSame('release/2026-04-08', $manifest['upstream']['intended_ref']);
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
