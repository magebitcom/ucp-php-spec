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

use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface;

/**
 * Checkout extended with AP2 mandate support.
 *
 * Schema: Checkout with AP2 Mandate Response
 */
interface Ap2MandateResponseCheckoutInterface
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
     * @return \Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface
     */
    public function getUcp(): UcpResponseCheckoutSchemaInterface;

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseCheckoutSchemaInterface $ucp): self;

    /**
     * Unique identifier of the checkout session.
     *
     * @return string
     */
    public function getId(): string;

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[]
     */
    public function getLineItems(): array;

    /**
     * List of line items being checked out.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Representation of the buyer.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null;

    /**
     * Representation of the buyer.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self;

    /**
     * Checkout state indicating the current phase and required action. See Checkout Status lifecycle documentation for state transition details.
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Checkout state indicating the current phase and required action. See Checkout Status lifecycle documentation for state transition details.
     *
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self;

    /**
     * ISO 4217 currency code reflecting the merchant's market determination. Derived from address, context, and geo IP—buyers provide signals, merchants determine currency.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * ISO 4217 currency code reflecting the merchant's market determination. Derived from address, context, and geo IP—buyers provide signals, merchants determine currency.
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self;

    /**
     * Different cart totals.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * Different cart totals.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]
     */
    public function getLinks(): array;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[] $links
     * @return self
     */
    public function setLinks(array $links): self;

    /**
     * RFC 3339 expiry timestamp. Default TTL is 6 hours from creation if not sent.
     *
     * @return string|null
     */
    public function getExpiresAt(): string|null;

    /**
     * RFC 3339 expiry timestamp. Default TTL is 6 hours from creation if not sent.
     *
     * @param string|null $expiresAt
     * @return self
     */
    public function setExpiresAt(string|null $expiresAt): self;

    /**
     * URL for checkout handoff and session recovery. MUST be provided when status is requires_escalation. See specification for format and availability requirements.
     *
     * @return string|null
     */
    public function getContinueUrl(): string|null;

    /**
     * URL for checkout handoff and session recovery. MUST be provided when status is requires_escalation. See specification for format and availability requirements.
     *
     * @param string|null $continueUrl
     * @return self
     */
    public function setContinueUrl(string|null $continueUrl): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null
     */
    public function getPayment(): PaymentInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null $payment
     * @return self
     */
    public function setPayment(PaymentInterface|null $payment): self;

    /**
     * Details about an order created for this checkout session.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface|null
     */
    public function getOrder(): OrderConfirmationInterface|null;

    /**
     * Details about an order created for this checkout session.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface|null $order
     * @return self
     */
    public function setOrder(OrderConfirmationInterface|null $order): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null
     */
    public function getAp2(): Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null $ap2
     * @return self
     */
    public function setAp2(Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null $ap2): self;
}
