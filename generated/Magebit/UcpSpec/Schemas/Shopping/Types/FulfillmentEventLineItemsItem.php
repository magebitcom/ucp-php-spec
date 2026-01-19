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

interface FulfillmentEventLineItemsItem
{
    /**
     * Line item ID reference.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Quantity fulfilled in this event.
     *
     * @return int
     */
    function getQuantity(): int;
}
