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

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentOptionResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A fulfillment option within a group (e.g., Standard Shipping $5, Express $15).
 */
class FulfillmentOptionResponse extends SpecObject implements FulfillmentOptionResponseInterface
{
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
    public function getTitle(): string
    {
        return $this->requireString(self::KEY_TITLE);
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        return $this->set(self::KEY_TITLE, $title);
    }

    /**
     * @return string|null
     */
    public function getDescription(): string|null
    {
        return $this->stringOrNull(self::KEY_DESCRIPTION);
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self
    {
        return $this->set(self::KEY_DESCRIPTION, $description);
    }

    /**
     * @return string|null
     */
    public function getCarrier(): string|null
    {
        return $this->stringOrNull(self::KEY_CARRIER);
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
    public function getEarliestFulfillmentTime(): string|null
    {
        return $this->stringOrNull(self::KEY_EARLIEST_FULFILLMENT_TIME);
    }

    /**
     * @param string|null $earliestFulfillmentTime
     * @return self
     */
    public function setEarliestFulfillmentTime(string|null $earliestFulfillmentTime): self
    {
        return $this->set(self::KEY_EARLIEST_FULFILLMENT_TIME, $earliestFulfillmentTime);
    }

    /**
     * @return string|null
     */
    public function getLatestFulfillmentTime(): string|null
    {
        return $this->stringOrNull(self::KEY_LATEST_FULFILLMENT_TIME);
    }

    /**
     * @param string|null $latestFulfillmentTime
     * @return self
     */
    public function setLatestFulfillmentTime(string|null $latestFulfillmentTime): self
    {
        return $this->set(self::KEY_LATEST_FULFILLMENT_TIME, $latestFulfillmentTime);
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
