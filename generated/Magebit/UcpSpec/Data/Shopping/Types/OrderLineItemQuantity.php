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

use Magebit\UcpSpec\Api\Shopping\Types\OrderLineItemQuantityInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Quantity tracking for the line item.
 */
class OrderLineItemQuantity extends SpecObject implements OrderLineItemQuantityInterface
{
    /**
     * @return int|null
     */
    public function getOriginal(): int|null
    {
        return $this->intOrNull(self::KEY_ORIGINAL);
    }

    /**
     * @param int|null $original
     * @return self
     */
    public function setOriginal(int|null $original): self
    {
        return $this->set(self::KEY_ORIGINAL, $original);
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->requireInt(self::KEY_TOTAL);
    }

    /**
     * @param int $total
     * @return self
     */
    public function setTotal(int $total): self
    {
        return $this->set(self::KEY_TOTAL, $total);
    }

    /**
     * @return int
     */
    public function getFulfilled(): int
    {
        return $this->requireInt(self::KEY_FULFILLED);
    }

    /**
     * @param int $fulfilled
     * @return self
     */
    public function setFulfilled(int $fulfilled): self
    {
        return $this->set(self::KEY_FULFILLED, $fulfilled);
    }
}
