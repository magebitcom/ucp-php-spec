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
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\LineItemUpdateRequestInterface;

/**
 * Base checkout schema. Extensions compose onto this using allOf.
 *
 * Schema: Checkout Update Request
 */
interface CheckoutUpdateRequestInterface
{
    public const KEY_ID = 'id';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_BUYER = 'buyer';
    public const KEY_CURRENCY = 'currency';
    public const KEY_PAYMENT = 'payment';

    /**
     * Unique identifier of the checkout session.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * List of line items being checked out.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\LineItemUpdateRequestInterface[]
     */
    public function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null;

    /**
     * ISO 4217 currency code.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\PaymentUpdateRequestInterface
     */
    public function getPayment(): PaymentUpdateRequestInterface;
}
