<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LineItemUpdateRequestInterface;

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
     * @param LineItemUpdateRequestInterface[] $line_items
     * @return self
     */
    public function setLineItems(array $line_items): self;

    /**
     * Representation of the buyer.
     *
     * @param BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self;

    /**
     * ISO 4217 currency code.
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self;

    /**
     * @param PaymentUpdateRequestInterface $payment
     * @return self
     */
    public function setPayment(PaymentUpdateRequestInterface $payment): self;

    /**
     * @param DiscountDiscountsObjectInterface|null $discounts
     * @return self
     */
    public function setDiscounts(DiscountDiscountsObjectInterface|null $discounts): self;
}
