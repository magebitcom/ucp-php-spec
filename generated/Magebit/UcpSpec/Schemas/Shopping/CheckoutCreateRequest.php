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
use Magebit\UcpSpec\Schemas\Shopping\Types\LineItemCreateRequest;

/**
 * Base checkout schema. Extensions compose onto this using allOf.
 *
 * Schema: Checkout Create Request
 */
interface CheckoutCreateRequest
{
    /**
     * List of line items being checked out.
     *
     * @return LineItemCreateRequest[]
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
     * @return PaymentCreateRequest
     */
    public function getPayment(): PaymentCreateRequest;
}
