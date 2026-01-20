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

use Magebit\UcpSpec\Api\Schemas\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\OrderConfirmationInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\Schemas\UcpResponseCheckoutInterface;

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
}
