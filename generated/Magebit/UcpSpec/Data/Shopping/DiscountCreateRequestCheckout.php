<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestCheckoutInterface;
use Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestDiscountsObjectInterface;
use Magebit\UcpSpec\Api\Shopping\PaymentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Checkout extended with discount capability.
 */
class DiscountCreateRequestCheckout extends SpecObject implements DiscountCreateRequestCheckoutInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[]
     */
    public function getLineItems(): array
    {
        return $this->getArray(self::KEY_LINE_ITEMS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        return $this->set(self::KEY_LINE_ITEMS, $lineItems);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null
    {
        return $this->get(self::KEY_BUYER);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self
    {
        return $this->set(self::KEY_BUYER, $buyer);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null
    {
        return $this->get(self::KEY_CONTEXT);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(ContextInterface|null $context): self
    {
        return $this->set(self::KEY_CONTEXT, $context);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null
     */
    public function getPayment(): PaymentInterface|null
    {
        return $this->get(self::KEY_PAYMENT);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null $payment
     * @return self
     */
    public function setPayment(PaymentInterface|null $payment): self
    {
        return $this->set(self::KEY_PAYMENT, $payment);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestDiscountsObjectInterface|null
     */
    public function getDiscounts(): DiscountCreateRequestDiscountsObjectInterface|null
    {
        return $this->get(self::KEY_DISCOUNTS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestDiscountsObjectInterface|null $discounts
     * @return self
     */
    public function setDiscounts(DiscountCreateRequestDiscountsObjectInterface|null $discounts): self
    {
        return $this->set(self::KEY_DISCOUNTS, $discounts);
    }
}
