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
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalCompleteRequestInterface;
use Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface;

/**
 * Order schema with line items, buyer-facing fulfillment expectations, and event logs.
 *
 * Schema: Order Complete Request
 */
interface OrderCompleteRequestInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_ID = 'id';
    public const KEY_LABEL = 'label';
    public const KEY_CHECKOUT_ID = 'checkout_id';
    public const KEY_PERMALINK_URL = 'permalink_url';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_FULFILLMENT = 'fulfillment';
    public const KEY_ADJUSTMENTS = 'adjustments';
    public const KEY_TOTALS = 'totals';
    public const KEY_MESSAGES = 'messages';

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
     * Human-readable label for identifying the order. MUST only be provided by the business.
     *
     * @return string|null
     */
    public function getLabel(): string|null;

    /**
     * Human-readable label for identifying the order. MUST only be provided by the business.
     *
     * @param string|null $label
     * @return self
     */
    public function setLabel(string|null $label): self;

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
     * Line items representing what was purchased — can change post-order via edits or exchanges.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface[]
     */
    public function getLineItems(): array;

    /**
     * Line items representing what was purchased — can change post-order via edits or exchanges.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\OrderCompleteRequestFulfillmentInterface
     */
    public function getFulfillment(): OrderCompleteRequestFulfillmentInterface;

    /**
     * Fulfillment data: buyer expectations and what actually happened.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\OrderCompleteRequestFulfillmentInterface $fulfillment
     * @return self
     */
    public function setFulfillment(OrderCompleteRequestFulfillmentInterface $fulfillment): self;

    /**
     * Post-order events (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface[]|null
     */
    public function getAdjustments(): array|null;

    /**
     * Post-order events (refunds, returns, credits, disputes, cancellations, etc.) that exist independently of fulfillment.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface[]|null $adjustments
     * @return self
     */
    public function setAdjustments(array|null $adjustments): self;

    /**
     * Different totals for the order.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalCompleteRequestInterface[]
     */
    public function getTotals(): array;

    /**
     * Different totals for the order.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalCompleteRequestInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;

    /**
     * Business outcome messages (errors, warnings, informational). Present when the business needs to communicate status or issues to the platform.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Business outcome messages (errors, warnings, informational). Present when the business needs to communicate status or issues to the platform.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self;
}
