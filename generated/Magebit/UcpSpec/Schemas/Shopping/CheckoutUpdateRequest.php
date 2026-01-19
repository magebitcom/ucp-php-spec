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
 * Base checkout schema. Extensions compose onto this using allOf.
 *
 * Schema: Checkout Update Request
 */
interface CheckoutUpdateRequest
{
    /**
     * Unique identifier of the checkout session.
     *
     * @return string
     */
    function getId(): string;

    /**
     * List of line items being checked out.
     *
     * @return LineItemUpdateRequest[]
     */
    function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return Buyer|null
     */
    function getBuyer(): Buyer|null;

    /**
     * ISO 4217 currency code.
     *
     * @return string
     */
    function getCurrency(): string;

    /**
     * @return PaymentUpdateRequest
     */
    function getPayment(): PaymentUpdateRequest;
}
