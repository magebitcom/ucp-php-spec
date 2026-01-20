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

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\OrderConfirmationInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\MutableApi\Schemas\UcpResponseCheckoutInterface;

/**
 * Checkout extended with hierarchical fulfillment.
 *
 * Schema: Checkout with Fulfillment Response
 */
interface FulfillmentCheckoutInterface
{
    public const STATUS_INCOMPLETE = 'incomplete';
    public const STATUS_REQUIRES_ESCALATION = 'requires_escalation';
    public const STATUS_READY_FOR_COMPLETE = 'ready_for_complete';
    public const STATUS_COMPLETE_IN_PROGRESS = 'complete_in_progress';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELED = 'canceled';

    /**
     * @return UcpResponseCheckoutInterface
     */
    public function getUcp(): UcpResponseCheckoutInterface;

    /**
     * Unique identifier of the checkout session.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * List of line items being checked out.
     *
     * @return LineItemResponseInterface[]
     */
    public function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null;

    /**
     * Checkout state indicating the current phase and required action. See Checkout Status lifecycle documentation for state transition details.
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * ISO 4217 currency code.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * Different cart totals.
     *
     * @return TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @return MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @return LinkInterface[]
     */
    public function getLinks(): array;

    /**
     * RFC 3339 expiry timestamp. Default TTL is 6 hours from creation if not sent.
     *
     * @return string|null
     */
    public function getExpiresAt(): string|null;

    /**
     * URL for checkout handoff and session recovery. MUST be provided when status is requires_escalation. See specification for format and availability requirements.
     *
     * @return string|null
     */
    public function getContinueUrl(): string|null;

    /**
     * @return PaymentResponseInterface
     */
    public function getPayment(): PaymentResponseInterface;

    /**
     * Details about an order created for this checkout session.
     *
     * @return OrderConfirmationInterface|null
     */
    public function getOrder(): OrderConfirmationInterface|null;

    /**
     * Fulfillment details.
     *
     * @return FulfillmentFulfillmentInterface|null
     */
    public function getFulfillment(): FulfillmentFulfillmentInterface|null;

    /**
     * @param UcpResponseCheckoutInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseCheckoutInterface $ucp): self;

    /**
     * Unique identifier of the checkout session.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * List of line items being checked out.
     *
     * @param LineItemResponseInterface[] $line_items
     * @return self
     */
    public function setLineItems(array $line_items): self;

    /**
     * Representation of the buyer.
     *
     * @param BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self;

    /**
     * Checkout state indicating the current phase and required action. See Checkout Status lifecycle documentation for state transition details.
     *
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self;

    /**
     * ISO 4217 currency code.
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self;

    /**
     * Different cart totals.
     *
     * @param TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @param MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @param LinkInterface[] $links
     * @return self
     */
    public function setLinks(array $links): self;

    /**
     * RFC 3339 expiry timestamp. Default TTL is 6 hours from creation if not sent.
     *
     * @param string|null $expires_at
     * @return self
     */
    public function setExpiresAt(string|null $expires_at): self;

    /**
     * URL for checkout handoff and session recovery. MUST be provided when status is requires_escalation. See specification for format and availability requirements.
     *
     * @param string|null $continue_url
     * @return self
     */
    public function setContinueUrl(string|null $continue_url): self;

    /**
     * @param PaymentResponseInterface $payment
     * @return self
     */
    public function setPayment(PaymentResponseInterface $payment): self;

    /**
     * Details about an order created for this checkout session.
     *
     * @param OrderConfirmationInterface|null $order
     * @return self
     */
    public function setOrder(OrderConfirmationInterface|null $order): self;

    /**
     * Fulfillment details.
     *
     * @param FulfillmentFulfillmentInterface|null $fulfillment
     * @return self
     */
    public function setFulfillment(FulfillmentFulfillmentInterface|null $fulfillment): self;
}
