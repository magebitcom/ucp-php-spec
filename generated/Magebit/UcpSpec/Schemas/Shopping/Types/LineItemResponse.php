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
 * Schema: Line Item Response
 */
interface LineItemResponse
{
    /**
     * @return string
     */
    function getId(): string;

    /**
     * @return ItemResponse
     */
    function getItem(): ItemResponse;

    /**
     * Quantity of the item being purchased.
     *
     * @return int
     */
    function getQuantity(): int;

    /**
     * Line item totals breakdown.
     *
     * @return TotalResponse[]
     */
    function getTotals(): array;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @return string|null
     */
    function getParentId(): string|null;
}
