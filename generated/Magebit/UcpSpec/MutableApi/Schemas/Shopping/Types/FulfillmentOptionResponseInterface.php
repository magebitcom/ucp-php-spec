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
 * A fulfillment option within a group (e.g., Standard Shipping $5, Express $15).
 *
 * Schema: Fulfillment Option Response
 */
interface FulfillmentOptionResponseInterface
{
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
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self;

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
     * @param string|null $carrier
     * @return self
     */
    public function setCarrier(string|null $carrier): self;

    /**
     * Earliest fulfillment date.
     *
     * @param string|null $earliest_fulfillment_time
     * @return self
     */
    public function setEarliestFulfillmentTime(string|null $earliest_fulfillment_time): self;

    /**
     * Latest fulfillment date.
     *
     * @param string|null $latest_fulfillment_time
     * @return self
     */
    public function setLatestFulfillmentTime(string|null $latest_fulfillment_time): self;

    /**
     * Fulfillment option totals breakdown.
     *
     * @param TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;
}
