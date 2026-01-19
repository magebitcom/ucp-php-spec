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
 * Line item object. Expected to use the currency of the parent object.
 *
 * Schema: Line Item Create Request
 */
interface LineItemCreateRequest
{
    /**
     * @return ItemCreateRequest
     */
    function getItem(): ItemCreateRequest;

    /**
     * Quantity of the item being purchased.
     *
     * @return int
     */
    function getQuantity(): int;
}
