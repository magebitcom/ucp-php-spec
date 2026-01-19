<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Append-only fulfillment event representing an actual shipment. References line items by ID.
 *
 * Schema: Fulfillment Event
 */
interface FulfillmentEvent
{
    /**
     * Fulfillment event identifier.
     *
     * @return string
     */
    function getId(): string;

    /**
     * RFC 3339 timestamp when this fulfillment event occurred.
     *
     * @return string
     */
    function getOccurredAt(): string;

    /**
     * Fulfillment event type. Common values include: processing (preparing to ship), shipped (handed to carrier), in_transit (in delivery network), delivered (received by buyer), failed_attempt (delivery attempt failed), canceled (fulfillment canceled), undeliverable (cannot be delivered), returned_to_sender (returned to merchant).
     *
     * @return string
     */
    function getType(): string;

    /**
     * Which line items and quantities are fulfilled in this event.
     *
     * @return object[]
     */
    function getLineItems(): array;

    /**
     * Carrier tracking number (required if type != processing).
     *
     * @return string|null
     */
    function getTrackingNumber(): string|null;

    /**
     * URL to track this shipment (required if type != processing).
     *
     * @return string|null
     */
    function getTrackingUrl(): string|null;

    /**
     * Carrier name (e.g., 'FedEx', 'USPS').
     *
     * @return string|null
     */
    function getCarrier(): string|null;

    /**
     * Human-readable description of the shipment status or delivery information (e.g., 'Delivered to front door', 'Out for delivery').
     *
     * @return string|null
     */
    function getDescription(): string|null;
}
