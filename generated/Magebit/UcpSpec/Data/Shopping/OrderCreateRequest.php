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

use Magebit\UcpSpec\Api\Shopping\OrderCreateRequestFulfillmentInterface;
use Magebit\UcpSpec\Api\Shopping\OrderCreateRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalCreateRequestInterface;
use Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Order schema with line items, buyer-facing fulfillment expectations, and event logs.
 */
class OrderCreateRequest extends SpecObject implements OrderCreateRequestInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\OrderCreateRequestFulfillmentInterface
     */
    public function getFulfillment(): OrderCreateRequestFulfillmentInterface
    {
        return $this->requireInstance(self::KEY_FULFILLMENT, \Magebit\UcpSpec\Api\Shopping\OrderCreateRequestFulfillmentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\OrderCreateRequestFulfillmentInterface $fulfillment
     * @return self
     */
    public function setFulfillment(OrderCreateRequestFulfillmentInterface $fulfillment): self
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalCreateRequestInterface[]
     */
    public function getTotals(): array
    {
        return $this->instanceList(self::KEY_TOTALS, \Magebit\UcpSpec\Api\Shopping\Types\TotalCreateRequestInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalCreateRequestInterface[] $totals
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
}
