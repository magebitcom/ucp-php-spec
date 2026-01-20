<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\AdjustmentInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\OrderLineItemInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\MutableApi\Schemas\UcpResponseOrderInterface;

/**
 * Order schema with immutable line items, buyer-facing fulfillment expectations, and append-only event logs.
 *
 * Schema: Order
 */
interface OrderInterface
{
    /**
     * @return UcpResponseOrderInterface
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
     * @return OrderLineItemInterface[]
     */
    public function getLineItems(): array;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @return OrderFulfillmentInterface
     */
    public function getFulfillment(): OrderFulfillmentInterface;

    /**
     * Append-only event log of money movements (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @return AdjustmentInterface[]|null
     */
    public function getAdjustments(): array|null;

    /**
     * Different totals for the order.
     *
     * @return TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * @param UcpResponseOrderInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseOrderInterface $ucp): self;

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
     * @param string $checkout_id
     * @return self
     */
    public function setCheckoutId(string $checkout_id): self;

    /**
     * Permalink to access the order on merchant site.
     *
     * @param string $permalink_url
     * @return self
     */
    public function setPermalinkUrl(string $permalink_url): self;

    /**
     * Immutable line items — source of truth for what was ordered.
     *
     * @param OrderLineItemInterface[] $line_items
     * @return self
     */
    public function setLineItems(array $line_items): self;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @param OrderFulfillmentInterface $fulfillment
     * @return self
     */
    public function setFulfillment(OrderFulfillmentInterface $fulfillment): self;

    /**
     * Append-only event log of money movements (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @param AdjustmentInterface[]|null $adjustments
     * @return self
     */
    public function setAdjustments(array|null $adjustments): self;

    /**
     * Different totals for the order.
     *
     * @param TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;
}
