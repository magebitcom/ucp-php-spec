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
 * Checkout extended with discount capability.
 *
 * Schema: Checkout with Discount Update Request
 */
interface DiscountCheckoutInterface
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
     * @return LineItemUpdateRequestInterface[]
     */
    public function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null;

    /**
     * ISO 4217 currency code.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * @return PaymentUpdateRequestInterface
     */
    public function getPayment(): PaymentUpdateRequestInterface;

    /**
     * @return DiscountDiscountsObjectInterface|null
     */
    public function getDiscounts(): DiscountDiscountsObjectInterface|null;
}
