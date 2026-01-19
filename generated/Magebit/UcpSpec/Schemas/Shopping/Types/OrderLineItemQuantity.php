<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Quantity tracking. Both total and fulfilled are derived from events.
 */
interface OrderLineItemQuantity
{
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
}
