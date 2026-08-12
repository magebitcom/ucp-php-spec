<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * Schema: Order Line Item
 */
interface OrderLineItemInterface
{
    public const KEY_ID = 'id';
    public const KEY_ITEM = 'item';
    public const KEY_QUANTITY = 'quantity';
    public const KEY_TOTALS = 'totals';
    public const KEY_STATUS = 'status';
    public const KEY_PARENT_ID = 'parent_id';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_PARTIAL = 'partial';
    public const STATUS_FULFILLED = 'fulfilled';

    /**
     * Line item identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Line item identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Product data (id, title, price, image_url).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ItemResponseInterface
     */
    public function getItem(): ItemResponseInterface;

    /**
     * Product data (id, title, price, image_url).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ItemResponseInterface $item
     * @return self
     */
    public function setItem(ItemResponseInterface $item): self;

    /**
     * Quantity tracking. Both total and fulfilled are derived from events.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemQuantityInterface
     */
    public function getQuantity(): OrderLineItemQuantityInterface;

    /**
     * Quantity tracking. Both total and fulfilled are derived from events.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemQuantityInterface $quantity
     * @return self
     */
    public function setQuantity(OrderLineItemQuantityInterface $quantity): self;

    /**
     * Line item totals breakdown.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * Line item totals breakdown.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;

    /**
     * Derived status: fulfilled if quantity.fulfilled == quantity.total, partial if quantity.fulfilled > 0, otherwise processing.
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Derived status: fulfilled if quantity.fulfilled == quantity.total, partial if quantity.fulfilled > 0, otherwise processing.
     *
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @return string|null
     */
    public function getParentId(): string|null;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @param string|null $parentId
     * @return self
     */
    public function setParentId(string|null $parentId): self;
}
