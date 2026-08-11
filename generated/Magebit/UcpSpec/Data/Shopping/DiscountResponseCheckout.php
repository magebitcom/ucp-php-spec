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

use Magebit\UcpSpec\Api\Shopping\DiscountResponseCheckoutInterface;
use Magebit\UcpSpec\Api\Shopping\DiscountResponseDiscountsObjectInterface;
use Magebit\UcpSpec\Api\Shopping\PaymentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Checkout extended with discount capability.
 */
class DiscountResponseCheckout extends SpecObject implements DiscountResponseCheckoutInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface
     */
    public function getUcp(): UcpResponseCheckoutSchemaInterface
    {
        return $this->get(self::KEY_UCP);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseCheckoutSchemaInterface $ucp): self
    {
        return $this->set(self::KEY_UCP, $ucp);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->get(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[]
     */
    public function getLineItems(): array
    {
        return $this->getArray(self::KEY_LINE_ITEMS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[] $lineItems
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->get(self::KEY_STATUS);
    }

    /**
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self
    {
        return $this->set(self::KEY_STATUS, $status);
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->get(self::KEY_CURRENCY);
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        return $this->set(self::KEY_CURRENCY, $currency);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array
    {
        return $this->getArray(self::KEY_TOTALS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self
    {
        return $this->set(self::KEY_TOTALS, $totals);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null
    {
        return $this->get(self::KEY_MESSAGES);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self
    {
        return $this->set(self::KEY_MESSAGES, $messages);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]
     */
    public function getLinks(): array
    {
        return $this->getArray(self::KEY_LINKS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[] $links
     * @return self
     */
    public function setLinks(array $links): self
    {
        return $this->set(self::KEY_LINKS, $links);
    }

    /**
     * @return string|null
     */
    public function getExpiresAt(): string|null
    {
        return $this->get(self::KEY_EXPIRES_AT);
    }

    /**
     * @param string|null $expiresAt
     * @return self
     */
    public function setExpiresAt(string|null $expiresAt): self
    {
        return $this->set(self::KEY_EXPIRES_AT, $expiresAt);
    }

    /**
     * @return string|null
     */
    public function getContinueUrl(): string|null
    {
        return $this->get(self::KEY_CONTINUE_URL);
    }

    /**
     * @param string|null $continueUrl
     * @return self
     */
    public function setContinueUrl(string|null $continueUrl): self
    {
        return $this->set(self::KEY_CONTINUE_URL, $continueUrl);
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface|null
     */
    public function getOrder(): OrderConfirmationInterface|null
    {
        return $this->get(self::KEY_ORDER);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface|null $order
     * @return self
     */
    public function setOrder(OrderConfirmationInterface|null $order): self
    {
        return $this->set(self::KEY_ORDER, $order);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountResponseDiscountsObjectInterface|null
     */
    public function getDiscounts(): DiscountResponseDiscountsObjectInterface|null
    {
        return $this->get(self::KEY_DISCOUNTS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountResponseDiscountsObjectInterface|null $discounts
     * @return self
     */
    public function setDiscounts(DiscountResponseDiscountsObjectInterface|null $discounts): self
    {
        return $this->set(self::KEY_DISCOUNTS, $discounts);
    }
}
