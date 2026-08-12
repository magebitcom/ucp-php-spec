<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

use Magebit\UcpSpecGenerator\InterfaceBuilder;
use Magebit\UcpSpecGenerator\PhpDocGenerator;
use Magebit\UcpSpecGenerator\SchemaParser;
use Magebit\UcpSpecGenerator\TypeMapper;
use PHPUnit\Framework\TestCase;

/**
 * Covers the dedup key that decides whether a type is reused, skipped or overwritten
 */
class InterfaceBuilderTest extends TestCase
{
    use TempDirectoryTrait;

    /**
     * @return void
     */
    public function testDedupKeyIgnoresWhetherTheCallerAddedTheInterfaceSuffix(): void
    {
        $builder = $this->makeBuilder();

        $this->assertSame(
            $builder->dedupKey('Magebit\\UcpSpec\\Api\\Shopping', 'Checkout'),
            $builder->dedupKey('Magebit\\UcpSpec\\Api\\Shopping', 'CheckoutInterface')
        );
    }

    /**
     * @return void
     */
    public function testSameNameFromTheSameSourceIsDeduplicated(): void
    {
        $builder = $this->makeBuilder();
        $builder->markGenerated('Magebit\\UcpSpec\\Api\\Shopping', 'Checkout', '/spec/checkout.json');

        $this->assertTrue($builder->isGenerated('Magebit\\UcpSpec\\Api\\Shopping', 'CheckoutInterface', '/spec/checkout.json'));
        $this->assertSame([], $builder->getCollisions());
    }

    /**
     * A same-name hit from a different schema is a collision, so it must be regenerated, not dropped.
     *
     * @return void
     */
    public function testSameNameFromADifferentSourceIsReportedAsACollision(): void
    {
        $builder = $this->makeBuilder();
        $builder->markGenerated('Magebit\\UcpSpec\\Api\\Shopping', 'DiscountCheckout', '/spec/discount.update_req.json');

        $this->assertFalse(
            $builder->isGenerated('Magebit\\UcpSpec\\Api\\Shopping', 'DiscountCheckout', '/spec/discount_resp.json')
        );
        $this->assertSame(
            ['Magebit\\UcpSpec\\Api\\Shopping\\DiscountCheckoutInterface' => ['/spec/discount_resp.json']],
            $builder->getCollisions()
        );
    }

    /**
     * @return void
     */
    public function testAllOfIsMergedIntoASinglePropertySet(): void
    {
        $dir = $this->makeTempDir();
        file_put_contents($dir . '/base.json', json_encode([
            'type' => 'object',
            'properties' => ['id' => ['type' => 'string']],
        ]));

        $builder = $this->makeBuilder($dir);
        $merged = $builder->resolveCompositeSchema([
            'allOf' => [
                ['$ref' => 'base.json'],
                ['type' => 'object', 'properties' => ['display' => ['type' => 'object', 'properties' => ['brand' => ['type' => 'string']]]]],
            ],
        ], $dir . '/card.json');

        $this->assertSame(['id', 'display'], array_keys($merged['properties']));
    }

    /**
     * Build an InterfaceBuilder wired to a parser rooted at the given directory
     *
     * @param string|null $specDir Directory holding schema fixtures
     * @return InterfaceBuilder Configured builder
     */
    private function makeBuilder(?string $specDir = null): InterfaceBuilder
    {
        $parser = new SchemaParser($specDir ?? sys_get_temp_dir());
        $typeMapper = new TypeMapper($parser);

        return new InterfaceBuilder($parser, $typeMapper, new PhpDocGenerator($parser, $typeMapper));
    }
}
