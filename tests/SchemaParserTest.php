<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

use Magebit\UcpSpecGenerator\SchemaParser;
use PHPUnit\Framework\TestCase;

/**
 * Covers input ordering and the $ref destructuring that skipped alias definitions
 */
class SchemaParserTest extends TestCase
{
    use TempDirectoryTrait;

    /**
     * @return void
     */
    public function testSchemaFilesAreReturnedInSortedOrder(): void
    {
        $dir = $this->makeTempDir();
        mkdir($dir . '/types');

        foreach (['zeta.json', 'alpha.json', 'types/beta.json', 'notes.txt'] as $name) {
            file_put_contents($dir . '/' . $name, '{}');
        }

        $files = (new SchemaParser($dir))->findSchemaFiles($dir);
        $relative = array_map(static fn (string $f): string => substr($f, strlen($dir) + 1), $files);

        $this->assertSame(['alpha.json', 'types/beta.json', 'zeta.json'], $relative);
    }

    /**
     * @return void
     */
    public function testBareRefDefinitionIsRecognisedAsAnAlias(): void
    {
        $parser = new SchemaParser($this->makeTempDir());

        $this->assertTrue($parser->isRefAlias(['$ref' => 'types/fulfillment_resp.json']));
        $this->assertTrue($parser->isRefAlias(['$ref' => 'x.json', 'description' => 'aliased']));
        $this->assertFalse($parser->isRefAlias(['$ref' => 'x.json', 'type' => 'object']));
        $this->assertFalse($parser->isRefAlias(['allOf' => [['$ref' => 'x.json']]]));
        $this->assertFalse($parser->isRefAlias(['type' => 'string']));
    }

    /**
     * This is the shape that left FulfillmentFulfillmentInterface referenced but never generated.
     *
     * @return void
     */
    public function testResolveRefTargetFollowsAnAliasIntoAnotherFile(): void
    {
        $dir = $this->makeTempDir();
        mkdir($dir . '/types');

        file_put_contents($dir . '/types/fulfillment_resp.json', json_encode([
            'title' => 'Fulfillment Response',
            'type' => 'object',
            'properties' => ['methods' => ['type' => 'array']],
        ]));
        file_put_contents($dir . '/fulfillment_resp.json', json_encode([
            '$defs' => ['fulfillment' => ['$ref' => 'types/fulfillment_resp.json']],
        ]));

        $parser = new SchemaParser($dir);
        $target = $parser->resolveRefTarget('types/fulfillment_resp.json', $dir . '/fulfillment_resp.json');

        $this->assertSame('Fulfillment Response', $target['schema']['title']);
        $this->assertSame(realpath($dir . '/types/fulfillment_resp.json'), $target['file']);
    }

    /**
     * @return void
     */
    public function testResolveRefTargetFollowsAChainOfAliases(): void
    {
        $dir = $this->makeTempDir();

        file_put_contents($dir . '/leaf.json', json_encode(['type' => 'object', 'title' => 'Leaf']));
        file_put_contents($dir . '/middle.json', json_encode(['$defs' => ['alias' => ['$ref' => 'leaf.json']]]));
        file_put_contents($dir . '/root.json', json_encode(['$defs' => ['alias' => ['$ref' => 'middle.json#/$defs/alias']]]));

        $parser = new SchemaParser($dir);
        $target = $parser->resolveRefTarget('middle.json#/$defs/alias', $dir . '/root.json');

        $this->assertSame('Leaf', $target['schema']['title']);
        $this->assertSame(realpath($dir . '/leaf.json'), $target['file']);
    }

    /**
     * @return void
     */
    public function testResolveRefTargetRejectsACircularAlias(): void
    {
        $dir = $this->makeTempDir();
        file_put_contents($dir . '/loop.json', json_encode([
            '$defs' => ['a' => ['$ref' => '#/$defs/b'], 'b' => ['$ref' => '#/$defs/a']],
        ]));

        $this->expectException(\RuntimeException::class);

        (new SchemaParser($dir))->resolveRefTarget('#/$defs/a', $dir . '/loop.json');
    }
}
