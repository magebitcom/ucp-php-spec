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
 * Inventory availability hint for a fulfillment method type.
 *
 * Schema: Fulfillment Available Method Response
 */
interface FulfillmentAvailableMethodResponse
{
    /**
     * Fulfillment method type this availability applies to.
     *
     * @return string
     */
    function getType(): string;

    /**
     * Line items available for this fulfillment method.
     *
     * @return string[]
     */
    function getLineItemIds(): array;

    /**
     * 'now' for immediate availability, or ISO 8601 date for future (preorders, transfers).
     *
     * @return string|null
     */
    function getFulfillableOn(): string|null;

    /**
     * Human-readable availability info (e.g., 'Available for pickup at Downtown Store today').
     *
     * @return string|null
     */
    function getDescription(): string|null;
}
