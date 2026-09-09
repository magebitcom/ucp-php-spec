<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

use Magebit\UcpSpecGenerator\InterfaceBuilder;
use Nette\PhpGenerator\PhpFile;
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
     * @return void
     */
    public function testCarriedKeywordsAreEmittedAsOneConstantKeyedByField(): void
    {
        $dir = $this->makeTempDir();
        $builder = $this->makeBuilder($dir);

        $file = $builder->buildInterface('Address', [
            'type' => 'object',
            'properties' => [
                'postalCode' => ['type' => 'string', 'maxLength' => 20],
                'country' => ['type' => 'string', 'pattern' => '^[A-Z]{2}$'],
                'email' => ['type' => 'string', 'format' => 'email'],
            ],
        ], 'Magebit\\UcpSpec\\Api', $dir . '/address.json');

        $this->assertSame(
            [
                'postal_code' => ['maxLength' => 20],
                'country' => ['pattern' => '^[A-Z]{2}$'],
                'email' => ['format' => 'email'],
            ],
            $this->constraintsOf($file)
        );
    }

    /**
     * A schema that constrains nothing must not carry an empty constant, so a consumer can tell
     * "no rules" from "rules the generator could not read".
     *
     * @return void
     */
    public function testNoConstantIsEmittedWhenNothingIsConstrained(): void
    {
        $dir = $this->makeTempDir();
        $builder = $this->makeBuilder($dir);

        $file = $builder->buildInterface('Note', [
            'type' => 'object',
            'properties' => ['text' => ['type' => 'string']],
        ], 'Magebit\\UcpSpec\\Api', $dir . '/note.json');

        $this->assertNull($this->constraintsOf($file));
    }

    /**
     * @return void
     */
    public function testKeywordsAreReadThroughAReference(): void
    {
        $dir = $this->makeTempDir();
        file_put_contents($dir . '/currency.json', json_encode([
            'type' => 'string',
            'pattern' => '^[A-Z]{3}$',
        ]));

        $builder = $this->makeBuilder($dir);
        $file = $builder->buildInterface('Money', [
            'type' => 'object',
            'properties' => ['currency' => ['$ref' => 'currency.json']],
        ], 'Magebit\\UcpSpec\\Api', $dir . '/money.json');

        $this->assertSame(['currency' => ['pattern' => '^[A-Z]{3}$']], $this->constraintsOf($file));
    }

    /**
     * @param PhpFile $file Generated file
     * @return array<string, array<string, scalar>>|null The emitted rules, or null when none were
     */
    private function constraintsOf(PhpFile $file): ?array
    {
        $interface = array_values($file->getNamespaces())[0]->getClasses();
        $constants = array_values($interface)[0]->getConstants();

        return isset($constants['CONSTRAINTS']) ? $constants['CONSTRAINTS']->getValue() : null;
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
