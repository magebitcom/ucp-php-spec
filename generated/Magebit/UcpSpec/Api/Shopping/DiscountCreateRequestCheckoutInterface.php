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
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface;

/**
 * Checkout extended with discount capability.
 *
 * Schema: Checkout with Discount Create Request
 */
interface DiscountCreateRequestCheckoutInterface
{
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_BUYER = 'buyer';
    public const KEY_CONTEXT = 'context';
    public const KEY_PAYMENT = 'payment';
    public const KEY_DISCOUNTS = 'discounts';

    /**
     * List of line items being checked out.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[]
     */
    public function getLineItems(): array;

    /**
     * List of line items being checked out.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[] $lineItems
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(ContextInterface|null $context): self;

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
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestDiscountsObjectInterface|null
     */
    public function getDiscounts(): DiscountCreateRequestDiscountsObjectInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestDiscountsObjectInterface|null $discounts
     * @return self
     */
    public function setDiscounts(DiscountCreateRequestDiscountsObjectInterface|null $discounts): self;
}
