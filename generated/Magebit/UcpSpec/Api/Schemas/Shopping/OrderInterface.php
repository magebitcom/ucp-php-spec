<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping;

use Magebit\UcpSpec\Api\Schemas\Shopping\Types\AdjustmentInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\OrderLineItemInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\Schemas\UcpResponseOrderInterface;

/**
 * Order schema with immutable line items, buyer-facing fulfillment expectations, and append-only event logs.
 *
 * Schema: Order
 */
interface OrderInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_ID = 'id';
    public const KEY_CHECKOUT_ID = 'checkout_id';
    public const KEY_PERMALINK_URL = 'permalink_url';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_FULFILLMENT = 'fulfillment';
    public const KEY_ADJUSTMENTS = 'adjustments';
    public const KEY_TOTALS = 'totals';

    /**
     * @return \Magebit\UcpSpec\Api\Schemas\UcpResponseOrderInterface
     */
    public function getUcp(): UcpResponseOrderInterface;

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
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\OrderLineItemInterface[]
     */
    public function getLineItems(): array;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\OrderFulfillmentInterface
     */
    public function getFulfillment(): OrderFulfillmentInterface;

    /**
     * Append-only event log of money movements (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\AdjustmentInterface[]|null
     */
    public function getAdjustments(): array|null;

    /**
     * Different totals for the order.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;
}
