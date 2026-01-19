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

use Magebit\UcpSpec\Schemas\Shopping\Types\Buyer;
use Magebit\UcpSpec\Schemas\Shopping\Types\LineItemUpdateRequest;

/**
 * Checkout extended with hierarchical fulfillment.
 *
 * Schema: Checkout with Fulfillment Update Request
 */
interface FulfillmentCheckout
{
    /**
     * Unique identifier of the checkout session.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * List of line items being checked out.
     *
     * @return LineItemUpdateRequest[]
     */
    public function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return Buyer|null
     */
    public function getBuyer(): Buyer|null;

    /**
     * ISO 4217 currency code.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * @return PaymentUpdateRequest
     */
    public function getPayment(): PaymentUpdateRequest;

    /**
     * Fulfillment details.
     *
     * @return FulfillmentFulfillment|null
     */
    public function getFulfillment(): FulfillmentFulfillment|null;
}
