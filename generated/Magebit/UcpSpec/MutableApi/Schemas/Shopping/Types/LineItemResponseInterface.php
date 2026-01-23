<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

/**
 * Line item object. Expected to use the currency of the parent object.
 *
 * Schema: Line Item Response
 */
interface LineItemResponseInterface
{
    public const KEY_ID = 'id';
    public const KEY_ITEM = 'item';
    public const KEY_QUANTITY = 'quantity';
    public const KEY_TOTALS = 'totals';
    public const KEY_PARENT_ID = 'parent_id';

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ItemResponseInterface
     */
    public function getItem(): ItemResponseInterface;

    /**
     * Quantity of the item being purchased.
     *
     * @return int
     */
    public function getQuantity(): int;

    /**
     * Line item totals breakdown.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @return string|null
     */
    public function getParentId(): string|null;

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ItemResponseInterface $item
     * @return self
     */
    public function setItem(ItemResponseInterface $item): self;

    /**
     * Quantity of the item being purchased.
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;

    /**
     * Line item totals breakdown.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @param string|null $parentId
     * @return self
     */
    public function setParentId(?string $parentId): self;
}
