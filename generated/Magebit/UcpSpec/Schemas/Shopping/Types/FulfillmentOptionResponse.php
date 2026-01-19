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
 * A fulfillment option within a group (e.g., Standard Shipping $5, Express $15).
 *
 * Schema: Fulfillment Option Response
 */
interface FulfillmentOptionResponse
{
    /**
     * Unique fulfillment option identifier.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Short label (e.g., 'Express Shipping', 'Curbside Pickup').
     *
     * @return string
     */
    function getTitle(): string;

    /**
     * Complete context for buyer decision (e.g., 'Arrives Dec 12-15 via FedEx').
     *
     * @return string|null
     */
    function getDescription(): string|null;

    /**
     * Carrier name (for shipping).
     *
     * @return string|null
     */
    function getCarrier(): string|null;

    /**
     * Earliest fulfillment date.
     *
     * @return string|null
     */
    function getEarliestFulfillmentTime(): string|null;

    /**
     * Latest fulfillment date.
     *
     * @return string|null
     */
    function getLatestFulfillmentTime(): string|null;

    /**
     * Fulfillment option totals breakdown.
     *
     * @return TotalResponse[]
     */
    function getTotals(): array;
}
