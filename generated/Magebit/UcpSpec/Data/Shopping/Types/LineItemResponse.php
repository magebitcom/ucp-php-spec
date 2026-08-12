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

use Magebit\UcpSpec\Api\Shopping\Types\ItemResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Line item object. Expected to use the currency of the parent object.
 */
class LineItemResponse extends SpecObject implements LineItemResponseInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ItemResponseInterface
     */
    public function getItem(): ItemResponseInterface
    {
        return $this->requireInstance(self::KEY_ITEM, \Magebit\UcpSpec\Api\Shopping\Types\ItemResponseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ItemResponseInterface $item
     * @return self
     */
    public function setItem(ItemResponseInterface $item): self
    {
        return $this->set(self::KEY_ITEM, $item);
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->requireInt(self::KEY_QUANTITY);
    }

    /**
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self
    {
        return $this->set(self::KEY_QUANTITY, $quantity);
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

    /**
     * @return string|null
     */
    public function getParentId(): string|null
    {
        return $this->stringOrNull(self::KEY_PARENT_ID);
    }

    /**
     * @param string|null $parentId
     * @return self
     */
    public function setParentId(string|null $parentId): self
    {
        return $this->set(self::KEY_PARENT_ID, $parentId);
    }
}
