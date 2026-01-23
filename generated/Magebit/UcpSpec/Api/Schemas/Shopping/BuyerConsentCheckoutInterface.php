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

use Magebit\UcpSpec\Api\Schemas\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\OrderConfirmationInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\Schemas\UcpResponseCheckoutInterface;

/**
 * Checkout extended with consent tracking via buyer object.
 *
 * Schema: Checkout with Buyer Consent Response
 */
interface BuyerConsentCheckoutInterface
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
    public const STATUS_INCOMPLETE = 'incomplete';
    public const STATUS_REQUIRES_ESCALATION = 'requires_escalation';
    public const STATUS_READY_FOR_COMPLETE = 'ready_for_complete';
    public const STATUS_COMPLETE_IN_PROGRESS = 'complete_in_progress';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_CANCELED = 'canceled';

    /**
     * @return \Magebit\UcpSpec\Api\Schemas\UcpResponseCheckoutInterface
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
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\LineItemResponseInterface[]
     */
    public function getLineItems(): array;

    /**
     * Buyer with consent tracking.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\BuyerConsentBuyerInterface|null
     */
    public function getBuyer(): BuyerConsentBuyerInterface|null;

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
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\LinkInterface[]
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
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\PaymentResponseInterface
     */
    public function getPayment(): PaymentResponseInterface;

    /**
     * Details about an order created for this checkout session.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\OrderConfirmationInterface|null
     */
    public function getOrder(): OrderConfirmationInterface|null;
}
