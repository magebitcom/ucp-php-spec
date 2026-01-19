<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Schema: Order Line Item
 */
interface OrderLineItem
{
    /**
     * Line item identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Product data (id, title, price, image_url).
     *
     * @return ItemResponse
     */
    public function getItem(): ItemResponse;

    /**
     * Quantity tracking. Both total and fulfilled are derived from events.
     *
     * @return object
     */
    public function getQuantity(): object;

    /**
     * Line item totals breakdown.
     *
     * @return TotalResponse[]
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
