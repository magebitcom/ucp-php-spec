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

use Magebit\UcpSpec\Api\Shopping\Types\AdjustmentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\AdjustmentLineItemsItemInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Append-only event that exists independently of fulfillment. Typically represents money movements but can be any post-order change. Polymorphic type that can optionally reference line items.
 */
class Adjustment extends SpecObject implements AdjustmentInterface
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
    public function getType(): string
    {
        return $this->requireString(self::KEY_TYPE);
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
     * @return string
     */
    public function getOccurredAt(): string
    {
        return $this->requireString(self::KEY_OCCURRED_AT);
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
    public function getStatus(): string
    {
        return $this->requireString(self::KEY_STATUS);
    }

    /**
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self
    {
        return $this->set(self::KEY_STATUS, $status);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentLineItemsItemInterface[]|null
     */
    public function getLineItems(): array|null
    {
        return $this->instanceListOrNull(self::KEY_LINE_ITEMS, \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentLineItemsItemInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentLineItemsItemInterface[]|null $lineItems
     * @return self
     */
    public function setLineItems(array|null $lineItems): self
    {
        return $this->set(self::KEY_LINE_ITEMS, $lineItems);
    }

    /**
     * @return int|null
     */
    public function getAmount(): int|null
    {
        return $this->intOrNull(self::KEY_AMOUNT);
    }

    /**
     * @param int|null $amount
     * @return self
     */
    public function setAmount(int|null $amount): self
    {
        return $this->set(self::KEY_AMOUNT, $amount);
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
}
