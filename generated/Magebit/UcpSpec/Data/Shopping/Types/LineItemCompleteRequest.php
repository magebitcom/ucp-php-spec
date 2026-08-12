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

use Magebit\UcpSpec\Api\Shopping\Types\ItemCompleteRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemCompleteRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Line item object. Expected to use the currency of the parent object.
 */
class LineItemCompleteRequest extends SpecObject implements LineItemCompleteRequestInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ItemCompleteRequestInterface
     */
    public function getItem(): ItemCompleteRequestInterface
    {
        return $this->requireInstance(self::KEY_ITEM, \Magebit\UcpSpec\Api\Shopping\Types\ItemCompleteRequestInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ItemCompleteRequestInterface $item
     * @return self
     */
    public function setItem(ItemCompleteRequestInterface $item): self
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
