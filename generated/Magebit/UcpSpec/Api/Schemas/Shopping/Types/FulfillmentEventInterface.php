<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

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
}
