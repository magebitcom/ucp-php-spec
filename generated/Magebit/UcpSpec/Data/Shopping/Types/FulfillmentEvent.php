<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventLineItemsItemInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Append-only fulfillment event representing an actual shipment. References line items by ID.
 */
class FulfillmentEvent extends SpecObject implements FulfillmentEventInterface
{
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
     * @return string
     */
    public function getOccurredAt(): string
    {
        return $this->get(self::KEY_OCCURRED_AT);
    }

    /**
     * @param string $occurredAt
     * @return self
     */
    public function setOccurredAt(string $occurredAt): self
    {
        return $this->set(self::KEY_OCCURRED_AT, $occurredAt);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->get(self::KEY_TYPE);
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        return $this->set(self::KEY_TYPE, $type);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventLineItemsItemInterface[]
     */
    public function getLineItems(): array
    {
        return $this->getArray(self::KEY_LINE_ITEMS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventLineItemsItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        return $this->set(self::KEY_LINE_ITEMS, $lineItems);
    }

    /**
     * @return string|null
     */
    public function getTrackingNumber(): string|null
    {
        return $this->get(self::KEY_TRACKING_NUMBER);
    }

    /**
     * @param string|null $trackingNumber
     * @return self
     */
    public function setTrackingNumber(string|null $trackingNumber): self
    {
        return $this->set(self::KEY_TRACKING_NUMBER, $trackingNumber);
    }

    /**
     * @return string|null
     */
    public function getTrackingUrl(): string|null
    {
        return $this->get(self::KEY_TRACKING_URL);
    }

    /**
     * @param string|null $trackingUrl
     * @return self
     */
    public function setTrackingUrl(string|null $trackingUrl): self
    {
        return $this->set(self::KEY_TRACKING_URL, $trackingUrl);
    }

    /**
     * @return string|null
     */
    public function getCarrier(): string|null
    {
        return $this->get(self::KEY_CARRIER);
    }

    /**
     * @param string|null $carrier
     * @return self
     */
    public function setCarrier(string|null $carrier): self
    {
        return $this->set(self::KEY_CARRIER, $carrier);
    }

    /**
     * @return string|null
     */
    public function getDescription(): string|null
    {
        return $this->get(self::KEY_DESCRIPTION);
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self
    {
        return $this->set(self::KEY_DESCRIPTION, $description);
    }
}
