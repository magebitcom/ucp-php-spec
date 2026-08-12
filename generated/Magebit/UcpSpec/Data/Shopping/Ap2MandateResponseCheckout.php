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

use Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithMerchantAuthorizationInterface;
use Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseCheckoutInterface;
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
 * Checkout extended with AP2 mandate support.
 */
class Ap2MandateResponseCheckout extends SpecObject implements Ap2MandateResponseCheckoutInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface
     */
    public function getUcp(): UcpResponseCheckoutSchemaInterface
    {
        return $this->requireInstance(self::KEY_UCP, \Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface::class);
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
        return $this->requireString(self::KEY_ID);
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
        return $this->instanceList(self::KEY_LINE_ITEMS, \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface::class);
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
        return $this->instanceOrNull(self::KEY_BUYER, \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface::class);
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
        return $this->requireString(self::KEY_STATUS);
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
        return $this->requireString(self::KEY_CURRENCY);
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
        return $this->instanceList(self::KEY_TOTALS, \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface::class);
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
        return $this->instanceListOrNull(self::KEY_MESSAGES, \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface::class);
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
        return $this->instanceList(self::KEY_LINKS, \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface::class);
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
        return $this->stringOrNull(self::KEY_EXPIRES_AT);
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
        return $this->stringOrNull(self::KEY_CONTINUE_URL);
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
        return $this->instanceOrNull(self::KEY_PAYMENT, \Magebit\UcpSpec\Api\Shopping\PaymentInterface::class);
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
        return $this->instanceOrNull(self::KEY_ORDER, \Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface::class);
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
     * @return \Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null
     */
    public function getAp2(): Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null
    {
        return $this->instanceOrNull(self::KEY_AP2, \Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithMerchantAuthorizationInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null $ap2
     * @return self
     */
    public function setAp2(Ap2MandateResponseAp2WithMerchantAuthorizationInterface|null $ap2): self
    {
        return $this->set(self::KEY_AP2, $ap2);
    }
}
