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
 * Quantity tracking. Both total and fulfilled are derived from events.
 */
interface OrderLineItemQuantityInterface
{
    public const KEY_TOTAL = 'total';
    public const KEY_FULFILLED = 'fulfilled';

    /**
     * Current total quantity.
     *
     * @return int
     */
    public function getTotal(): int;

    /**
     * Quantity fulfilled (sum from fulfillment events).
     *
     * @return int
     */
    public function getFulfilled(): int;

    /**
     * Current total quantity.
     *
     * @param int $total
     * @return self
     */
    public function setTotal(int $total): self;

    /**
     * Quantity fulfilled (sum from fulfillment events).
     *
     * @param int $fulfilled
     * @return self
     */
    public function setFulfilled(int $fulfilled): self;
}
