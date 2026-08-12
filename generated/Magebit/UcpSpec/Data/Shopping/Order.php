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

use Magebit\UcpSpec\Api\Shopping\OrderFulfillmentInterface;
use Magebit\UcpSpec\Api\Shopping\OrderInterface;
use Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\UcpResponseOrderSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Order schema with immutable line items, buyer-facing fulfillment expectations, and append-only event logs.
 */
class Order extends SpecObject implements OrderInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\OrderFulfillmentInterface
     */
    public function getFulfillment(): OrderFulfillmentInterface
    {
        return $this->requireInstance(self::KEY_FULFILLMENT, \Magebit\UcpSpec\Api\Shopping\OrderFulfillmentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\OrderFulfillmentInterface $fulfillment
     * @return self
     */
    public function setFulfillment(OrderFulfillmentInterface $fulfillment): self
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
}
