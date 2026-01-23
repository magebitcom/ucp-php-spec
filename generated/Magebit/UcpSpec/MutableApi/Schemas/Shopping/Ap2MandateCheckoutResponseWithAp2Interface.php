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
 * Checkout extended with AP2 embedded signature support.
 *
 * Schema: Checkout with AP2 Mandate
 */
interface Ap2MandateCheckoutResponseWithAp2Interface
{
    public const KEY_UCP = 'ucp';
    public const KEY_ID = 'id';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_BUYER = 'buyer';
    public const KEY_STATUS = 'status';
    public const KEY_CURRENCY = 'currency';
    public const KEY_TOTALS = 'totals';
    public const KEY_MESSAGES = 'messages';
    public const KEY_LINKS = 'links';
    public const KEY_EXPIRES_AT = 'expires_at';
    public const KEY_CONTINUE_URL = 'continue_url';
    public const KEY_PAYMENT = 'payment';
    public const KEY_ORDER = 'order';
    public const KEY_AP2 = 'ap2';
    public const STATUS_INCOMPLETE = 'incomplete';
    public const STATUS_REQUIRES_ESCALATION = 'requires_escalation';
    public const STATUS_READY_FOR_COMPLETE = 'ready_for_complete';
    public const STATUS_COMPLETE_IN_PROGRESS = 'complete_in_progress';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELED = 'canceled';

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\UcpResponseCheckoutInterface
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
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LineItemResponseInterface[]
     */
    public function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BuyerInterface|null
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
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LinkInterface[]
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
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentResponseInterface
     */
    public function getPayment(): PaymentResponseInterface;

    /**
     * Details about an order created for this checkout session.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\OrderConfirmationInterface|null
     */
    public function getOrder(): OrderConfirmationInterface|null;

    /**
     * AP2 extension data including merchant authorization.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Ap2MandateAp2CheckoutResponseInterface|null
     */
    public function getAp2(): Ap2MandateAp2CheckoutResponseInterface|null;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\UcpResponseCheckoutInterface $ucp
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
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LineItemResponseInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Representation of the buyer.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(?BuyerInterface $buyer): self;

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
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(?array $messages): self;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LinkInterface[] $links
     * @return self
     */
    public function setLinks(array $links): self;

    /**
     * RFC 3339 expiry timestamp. Default TTL is 6 hours from creation if not sent.
     *
     * @param string|null $expiresAt
     * @return self
     */
    public function setExpiresAt(?string $expiresAt): self;

    /**
     * URL for checkout handoff and session recovery. MUST be provided when status is requires_escalation. See specification for format and availability requirements.
     *
     * @param string|null $continueUrl
     * @return self
     */
    public function setContinueUrl(?string $continueUrl): self;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentResponseInterface $payment
     * @return self
     */
    public function setPayment(PaymentResponseInterface $payment): self;

    /**
     * Details about an order created for this checkout session.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\OrderConfirmationInterface|null $order
     * @return self
     */
    public function setOrder(?OrderConfirmationInterface $order): self;

    /**
     * AP2 extension data including merchant authorization.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Ap2MandateAp2CheckoutResponseInterface|null $ap2
     * @return self
     */
    public function setAp2(?Ap2MandateAp2CheckoutResponseInterface $ap2): self;
}
