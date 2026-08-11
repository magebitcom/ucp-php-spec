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

use Magebit\UcpSpec\Api\Shopping\Types\ItemCreateRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Line item object. Expected to use the currency of the parent object.
 */
class LineItemCreateRequest extends SpecObject implements LineItemCreateRequestInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ItemCreateRequestInterface
     */
    public function getItem(): ItemCreateRequestInterface
    {
        return $this->requireInstance(self::KEY_ITEM, \Magebit\UcpSpec\Api\Shopping\Types\ItemCreateRequestInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ItemCreateRequestInterface $item
     * @return self
     */
    public function setItem(ItemCreateRequestInterface $item): self
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
}
