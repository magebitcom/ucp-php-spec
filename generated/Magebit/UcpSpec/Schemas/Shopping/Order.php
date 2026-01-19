<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping;

use Magebit\UcpSpec\Schemas\Shopping\Types\Adjustment;
use Magebit\UcpSpec\Schemas\Shopping\Types\OrderLineItem;
use Magebit\UcpSpec\Schemas\Shopping\Types\TotalResponse;
use Magebit\UcpSpec\Schemas\UcpResponseOrder;

/**
 * Order schema with immutable line items, buyer-facing fulfillment expectations, and append-only event logs.
 */
interface Order
{
    /**
     * @return UcpResponseOrder
     */
    public function getUcp(): UcpResponseOrder;

    /**
     * Unique order identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Associated checkout ID for reconciliation.
     *
     * @return string
     */
    public function getCheckoutId(): string;

    /**
     * Permalink to access the order on merchant site.
     *
     * @return string
     */
    public function getPermalinkUrl(): string;

    /**
     * Immutable line items — source of truth for what was ordered.
     *
     * @return OrderLineItem[]
     */
    public function getLineItems(): array;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @return object
     */
    public function getFulfillment(): object;

    /**
     * Append-only event log of money movements (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @return Adjustment[]|null
     */
    public function getAdjustments(): array|null;

    /**
     * Different totals for the order.
     *
     * @return TotalResponse[]
     */
    public function getTotals(): array;
}
