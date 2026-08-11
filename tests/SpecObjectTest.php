<?php
/**
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */
declare(strict_types=1);

namespace Magebit\UcpSpecGenerator\Test;

use Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Data\Shopping\Types\ItemResponse;
use Magebit\UcpSpec\Data\Shopping\Types\LineItemResponse;
use Magebit\UcpSpec\Data\Shopping\Types\TotalResponse;
use PHPUnit\Framework\TestCase;

/**
 * Behaviour of the hand-written runtime the generated DTOs are built on
 */
class SpecObjectTest extends TestCase
{
    /**
     * @return void
     */
    public function testSettersRoundTripThroughGetters(): void
    {
        $lineItem = (new LineItemResponse())
            ->setId('li_1')
            ->setQuantity(2)
            ->setItem((new ItemResponse())->setId('item_1'));

        $this->assertSame('li_1', $lineItem->getId());
        $this->assertSame(2, $lineItem->getQuantity());
        $this->assertSame('item_1', $lineItem->getItem()->getId());
    }

    /**
     * @return void
     */
    public function testConstructorSeedsValuesBySpecFieldName(): void
    {
        $lineItem = new LineItemResponse([LineItemResponseInterface::KEY_ID => 'li_2']);

        $this->assertSame('li_2', $lineItem->getId());
    }

    /**
     * A required list that was never set reads as empty rather than tripping the return type.
     *
     * @return void
     */
    public function testRequiredArrayDefaultsToEmpty(): void
    {
        $this->assertSame([], (new LineItemResponse())->getTotals());
    }

    /**
     * @return void
     */
    public function testAbsentNullableFieldIsNull(): void
    {
        $this->assertNull((new LineItemResponse())->getParentId());
    }

    /**
     * A required field that was never set is a programming error, not a silent empty string.
     *
     * @return void
     */
    public function testUnsetRequiredFieldFailsOnRead(): void
    {
        $this->expectException(\TypeError::class);

        (new LineItemResponse())->getId();
    }

    /**
     * @return void
     */
    public function testSerializationDropsNullsAndNestsChildren(): void
    {
        $lineItem = (new LineItemResponse())
            ->setId('li_1')
            ->setQuantity(1)
            ->setItem((new ItemResponse())->setId('item_1'))
            ->setTotals([(new TotalResponse())->setType('subtotal')->setAmount(500)]);

        $encoded = json_decode((string)json_encode($lineItem), true);

        $this->assertSame('li_1', $encoded['id']);
        $this->assertSame(['id' => 'item_1'], $encoded['item']);
        $this->assertSame([['type' => 'subtotal', 'amount' => 500]], $encoded['totals']);
        $this->assertArrayNotHasKey('parent_id', $encoded);
    }
}
