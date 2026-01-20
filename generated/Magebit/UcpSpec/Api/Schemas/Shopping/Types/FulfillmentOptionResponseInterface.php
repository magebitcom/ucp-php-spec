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
 * A fulfillment option within a group (e.g., Standard Shipping $5, Express $15).
 *
 * Schema: Fulfillment Option Response
 */
interface FulfillmentOptionResponseInterface
{
    public const KEY_ID = 'id';
    public const KEY_TITLE = 'title';
    public const KEY_DESCRIPTION = 'description';
    public const KEY_CARRIER = 'carrier';
    public const KEY_EARLIEST_FULFILLMENT_TIME = 'earliest_fulfillment_time';
    public const KEY_LATEST_FULFILLMENT_TIME = 'latest_fulfillment_time';
    public const KEY_TOTALS = 'totals';

    /**
     * Unique fulfillment option identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Short label (e.g., 'Express Shipping', 'Curbside Pickup').
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Complete context for buyer decision (e.g., 'Arrives Dec 12-15 via FedEx').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * Carrier name (for shipping).
     *
     * @return string|null
     */
    public function getCarrier(): string|null;

    /**
     * Earliest fulfillment date.
     *
     * @return string|null
     */
    public function getEarliestFulfillmentTime(): string|null;

    /**
     * Latest fulfillment date.
     *
     * @return string|null
     */
    public function getLatestFulfillmentTime(): string|null;

    /**
     * Fulfillment option totals breakdown.
     *
     * @return TotalResponseInterface[]
     */
    public function getTotals(): array;
}
