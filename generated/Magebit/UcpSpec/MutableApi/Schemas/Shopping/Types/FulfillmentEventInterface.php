<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

/**
 * Append-only fulfillment event representing an actual shipment. References line items by ID.
 *
 * Schema: Fulfillment Event
 */
interface FulfillmentEventInterface
{
    /**
     * Fulfillment event identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * RFC 3339 timestamp when this fulfillment event occurred.
     *
     * @return string
     */
    public function getOccurredAt(): string;

    /**
     * Fulfillment event type. Common values include: processing (preparing to ship), shipped (handed to carrier), in_transit (in delivery network), delivered (received by buyer), failed_attempt (delivery attempt failed), canceled (fulfillment canceled), undeliverable (cannot be delivered), returned_to_sender (returned to merchant).
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Which line items and quantities are fulfilled in this event.
     *
     * @return FulfillmentEventLineItemsItemInterface[]
     */
    public function getLineItems(): array;

    /**
     * Carrier tracking number (required if type != processing).
     *
     * @return string|null
     */
    public function getTrackingNumber(): string|null;

    /**
     * URL to track this shipment (required if type != processing).
     *
     * @return string|null
     */
    public function getTrackingUrl(): string|null;

    /**
     * Carrier name (e.g., 'FedEx', 'USPS').
     *
     * @return string|null
     */
    public function getCarrier(): string|null;

    /**
     * Human-readable description of the shipment status or delivery information (e.g., 'Delivered to front door', 'Out for delivery').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * Fulfillment event identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * RFC 3339 timestamp when this fulfillment event occurred.
     *
     * @param string $occurredAt
     * @return self
     */
    public function setOccurredAt(string $occurredAt): self;

    /**
     * Fulfillment event type. Common values include: processing (preparing to ship), shipped (handed to carrier), in_transit (in delivery network), delivered (received by buyer), failed_attempt (delivery attempt failed), canceled (fulfillment canceled), undeliverable (cannot be delivered), returned_to_sender (returned to merchant).
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Which line items and quantities are fulfilled in this event.
     *
     * @param FulfillmentEventLineItemsItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Carrier tracking number (required if type != processing).
     *
     * @param string|null $trackingNumber
     * @return self
     */
    public function setTrackingNumber(?string $trackingNumber): self;

    /**
     * URL to track this shipment (required if type != processing).
     *
     * @param string|null $trackingUrl
     * @return self
     */
    public function setTrackingUrl(?string $trackingUrl): self;

    /**
     * Carrier name (e.g., 'FedEx', 'USPS').
     *
     * @param string|null $carrier
     * @return self
     */
    public function setCarrier(?string $carrier): self;

    /**
     * Human-readable description of the shipment status or delivery information (e.g., 'Delivered to front door', 'Out for delivery').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self;
}
