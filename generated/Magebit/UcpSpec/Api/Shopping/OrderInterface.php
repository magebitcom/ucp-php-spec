<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

use Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface;

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
     * @return \Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface
     */
    public function getUcp(): UcpResponseOrderSchemaInterface;

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseOrderSchemaInterface $ucp): self;

    /**
     * Unique order identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Unique order identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Associated checkout ID for reconciliation.
     *
     * @return string
     */
    public function getCheckoutId(): string;

    /**
     * Associated checkout ID for reconciliation.
     *
     * @param string $checkoutId
     * @return self
     */
    public function setCheckoutId(string $checkoutId): self;

    /**
     * Permalink to access the order on merchant site.
     *
     * @return string
     */
    public function getPermalinkUrl(): string;

    /**
     * Permalink to access the order on merchant site.
     *
     * @param string $permalinkUrl
     * @return self
     */
    public function setPermalinkUrl(string $permalinkUrl): self;

    /**
     * Immutable line items — source of truth for what was ordered.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface[]
     */
    public function getLineItems(): array;

    /**
     * Immutable line items — source of truth for what was ordered.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\OrderFulfillmentInterface
     */
    public function getFulfillment(): OrderFulfillmentInterface;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\OrderFulfillmentInterface $fulfillment
     * @return self
     */
    public function setFulfillment(OrderFulfillmentInterface $fulfillment): self;

    /**
     * Append-only event log of money movements (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface[]|null
     */
    public function getAdjustments(): array|null;

    /**
     * Append-only event log of money movements (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface[]|null $adjustments
     * @return self
     */
    public function setAdjustments(array|null $adjustments): self;

    /**
     * Different totals for the order.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * Different totals for the order.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;
}
