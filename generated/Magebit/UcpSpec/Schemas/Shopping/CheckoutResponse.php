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

use Magebit\UcpSpec\Schemas\ResponseCheckout;
use Magebit\UcpSpec\Schemas\Shopping\Types\Buyer;
use Magebit\UcpSpec\Schemas\Shopping\Types\LineItemResponse;
use Magebit\UcpSpec\Schemas\Shopping\Types\Link;
use Magebit\UcpSpec\Schemas\Shopping\Types\Message;
use Magebit\UcpSpec\Schemas\Shopping\Types\OrderConfirmation;
use Magebit\UcpSpec\Schemas\Shopping\Types\TotalResponse;

/**
 * Base checkout schema. Extensions compose onto this using allOf.
 *
 * Schema: Checkout Response
 */
interface CheckoutResponse
{
    /**
     * @return ResponseCheckout
     */
    function getUcp(): ResponseCheckout;

    /**
     * Unique identifier of the checkout session.
     *
     * @return string
     */
    function getId(): string;

    /**
     * List of line items being checked out.
     *
     * @return LineItemResponse[]
     */
    function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return Buyer|null
     */
    function getBuyer(): Buyer|null;

    /**
     * Checkout state indicating the current phase and required action. See Checkout Status lifecycle documentation for state transition details.
     *
     * @return string
     */
    function getStatus(): string;

    /**
     * ISO 4217 currency code.
     *
     * @return string
     */
    function getCurrency(): string;

    /**
     * Different cart totals.
     *
     * @return TotalResponse[]
     */
    function getTotals(): array;

    /**
     * List of messages with error and info about the checkout session state.
     *
     * @return Message[]|null
     */
    function getMessages(): array|null;

    /**
     * Links to be displayed by the platform (Privacy Policy, TOS). Mandatory for legal compliance.
     *
     * @return Link[]
     */
    function getLinks(): array;

    /**
     * RFC 3339 expiry timestamp. Default TTL is 6 hours from creation if not sent.
     *
     * @return string|null
     */
    function getExpiresAt(): string|null;

    /**
     * URL for checkout handoff and session recovery. MUST be provided when status is requires_escalation. See specification for format and availability requirements.
     *
     * @return string|null
     */
    function getContinueUrl(): string|null;

    /**
     * @return PaymentResponse
     */
    function getPayment(): PaymentResponse;

    /**
     * Details about an order created for this checkout session.
     *
     * @return OrderConfirmation|null
     */
    function getOrder(): OrderConfirmation|null;
}
