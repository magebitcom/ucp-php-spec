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
 * Quantity tracking. Both total and fulfilled are derived from events.
 */
class OrderLineItemQuantity extends SpecObject implements OrderLineItemQuantityInterface
{
    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->get(self::KEY_TOTAL);
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
        return $this->get(self::KEY_FULFILLED);
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
