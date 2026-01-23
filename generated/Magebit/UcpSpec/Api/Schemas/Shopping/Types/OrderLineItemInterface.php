<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

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
     * Product data (id, title, price, image_url).
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\ItemResponseInterface
     */
    public function getItem(): ItemResponseInterface;

    /**
     * Quantity tracking. Both total and fulfilled are derived from events.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\OrderLineItemQuantityInterface
     */
    public function getQuantity(): OrderLineItemQuantityInterface;

    /**
     * Line item totals breakdown.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * Derived status: fulfilled if quantity.fulfilled == quantity.total, partial if quantity.fulfilled > 0, otherwise processing.
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @return string|null
     */
    public function getParentId(): string|null;
}
