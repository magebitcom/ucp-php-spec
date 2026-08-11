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
     * Unique fulfillment option identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Short label (e.g., 'Express Shipping', 'Curbside Pickup').
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Short label (e.g., 'Express Shipping', 'Curbside Pickup').
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self;

    /**
     * Complete context for buyer decision (e.g., 'Arrives Dec 12-15 via FedEx').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * Complete context for buyer decision (e.g., 'Arrives Dec 12-15 via FedEx').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self;

    /**
     * Carrier name (for shipping).
     *
     * @return string|null
     */
    public function getCarrier(): string|null;

    /**
     * Carrier name (for shipping).
     *
     * @param string|null $carrier
     * @return self
     */
    public function setCarrier(string|null $carrier): self;

    /**
     * Earliest fulfillment date.
     *
     * @return string|null
     */
    public function getEarliestFulfillmentTime(): string|null;

    /**
     * Earliest fulfillment date.
     *
     * @param string|null $earliestFulfillmentTime
     * @return self
     */
    public function setEarliestFulfillmentTime(string|null $earliestFulfillmentTime): self;

    /**
     * Latest fulfillment date.
     *
     * @return string|null
     */
    public function getLatestFulfillmentTime(): string|null;

    /**
     * Latest fulfillment date.
     *
     * @param string|null $latestFulfillmentTime
     * @return self
     */
    public function setLatestFulfillmentTime(string|null $latestFulfillmentTime): self;

    /**
     * Fulfillment option totals breakdown.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * Fulfillment option totals breakdown.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;
}
