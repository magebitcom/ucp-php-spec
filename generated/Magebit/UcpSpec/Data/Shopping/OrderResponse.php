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

use Magebit\UcpSpec\Api\Shopping\OrderResponseFulfillmentInterface;
use Magebit\UcpSpec\Api\Shopping\OrderResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalsResponseInterface;
use Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Order schema with line items, buyer-facing fulfillment expectations, and event logs.
 */
class OrderResponse extends SpecObject implements OrderResponseInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface
     */
    public function getUcp(): UcpResponseOrderSchemaInterface
    {
        return $this->requireInstance(self::KEY_UCP, \Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseOrderSchemaInterface $ucp): self
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
     * @return string|null
     */
    public function getLabel(): string|null
    {
        return $this->stringOrNull(self::KEY_LABEL);
    }

    /**
     * @param string|null $label
     * @return self
     */
    public function setLabel(string|null $label): self
    {
        return $this->set(self::KEY_LABEL, $label);
    }

    /**
     * @return string
     */
    public function getCheckoutId(): string
    {
        return $this->requireString(self::KEY_CHECKOUT_ID);
    }

    /**
     * @param string $checkoutId
     * @return self
     */
    public function setCheckoutId(string $checkoutId): self
    {
        return $this->set(self::KEY_CHECKOUT_ID, $checkoutId);
    }

    /**
     * @return string
     */
    public function getPermalinkUrl(): string
    {
        return $this->requireString(self::KEY_PERMALINK_URL);
    }

    /**
     * @param string $permalinkUrl
     * @return self
     */
    public function setPermalinkUrl(string $permalinkUrl): self
    {
        return $this->set(self::KEY_PERMALINK_URL, $permalinkUrl);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface[]
     */
    public function getLineItems(): array
    {
        return $this->instanceList(self::KEY_LINE_ITEMS, \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        return $this->set(self::KEY_LINE_ITEMS, $lineItems);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\OrderResponseFulfillmentInterface
     */
    public function getFulfillment(): OrderResponseFulfillmentInterface
    {
        return $this->requireInstance(self::KEY_FULFILLMENT, \Magebit\UcpSpec\Api\Shopping\OrderResponseFulfillmentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\OrderResponseFulfillmentInterface $fulfillment
     * @return self
     */
    public function setFulfillment(OrderResponseFulfillmentInterface $fulfillment): self
    {
        return $this->set(self::KEY_FULFILLMENT, $fulfillment);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface[]|null
     */
    public function getAdjustments(): array|null
    {
        return $this->instanceListOrNull(self::KEY_ADJUSTMENTS, \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface[]|null $adjustments
     * @return self
     */
    public function setAdjustments(array|null $adjustments): self
    {
        return $this->set(self::KEY_ADJUSTMENTS, $adjustments);
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
    public function getTotals(): TotalsResponseInterface
    {
        return $this->requireInstance(self::KEY_TOTALS, \Magebit\UcpSpec\Api\Shopping\Types\TotalsResponseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(TotalsResponseInterface $totals): self
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
     * @return array<string, string>|null
     */
    public function getAttribution(): array|null
    {
        return $this->arrayOrNull(self::KEY_ATTRIBUTION);
    }

    /**
     * @param array<string, string>|null $attribution
     * @return self
     */
    public function setAttribution(array|null $attribution): self
    {
        return $this->set(self::KEY_ATTRIBUTION, $attribution);
    }
}
