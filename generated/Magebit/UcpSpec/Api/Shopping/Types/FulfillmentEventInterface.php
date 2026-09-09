<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * Append-only fulfillment event representing an actual shipment. References line items by ID.
 *
 * Schema: Fulfillment Event
 */
interface FulfillmentEventInterface
{
    public const KEY_ID = 'id';
    public const KEY_OCCURRED_AT = 'occurred_at';
    public const KEY_TYPE = 'type';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_TRACKING_NUMBER = 'tracking_number';
    public const KEY_TRACKING_URL = 'tracking_url';
    public const KEY_CARRIER = 'carrier';
    public const KEY_DESCRIPTION = 'description';
    public const CONSTRAINTS = ['occurred_at' => ['format' => 'date-time'], 'tracking_url' => ['format' => 'uri']];

    /**
     * Fulfillment event identifier.
     *
     * @return string
     */
    public function getId(): string;

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
     * @return string
     */
    public function getOccurredAt(): string;

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
     * @return string
     */
    public function getType(): string;

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventLineItemsItemInterface[]
     */
    public function getLineItems(): array;

    /**
     * Which line items and quantities are fulfilled in this event.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventLineItemsItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Carrier tracking number (required if type != processing).
     *
     * @return string|null
     */
    public function getTrackingNumber(): string|null;

    /**
     * Carrier tracking number (required if type != processing).
     *
     * @param string|null $trackingNumber
     * @return self
     */
    public function setTrackingNumber(string|null $trackingNumber): self;

    /**
     * URL to track this shipment (required if type != processing).
     *
     * @return string|null
     */
    public function getTrackingUrl(): string|null;

    /**
     * URL to track this shipment (required if type != processing).
     *
     * @param string|null $trackingUrl
     * @return self
     */
    public function setTrackingUrl(string|null $trackingUrl): self;

    /**
     * Carrier name (e.g., 'FedEx', 'USPS').
     *
     * @return string|null
     */
    public function getCarrier(): string|null;

    /**
     * Carrier name (e.g., 'FedEx', 'USPS').
     *
     * @param string|null $carrier
     * @return self
     */
    public function setCarrier(string|null $carrier): self;

    /**
     * Human-readable description of the shipment status or delivery information (e.g., 'Delivered to front door', 'Out for delivery').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * Human-readable description of the shipment status or delivery information (e.g., 'Delivered to front door', 'Out for delivery').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self;
}
