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
 * Container for fulfillment methods and availability.
 *
 * Schema: Fulfillment Response
 */
interface FulfillmentResponse
{
    /**
     * Fulfillment methods for cart items.
     *
     * @return FulfillmentMethodResponse[]|null
     */
    function getMethods(): array|null;

    /**
     * Inventory availability hints.
     *
     * @return FulfillmentAvailableMethodResponse[]|null
     */
    function getAvailableMethods(): array|null;
}
