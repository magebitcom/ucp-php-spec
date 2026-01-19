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
 * Merchant's fulfillment configuration.
 *
 * Schema: Merchant Fulfillment Config
 */
interface MerchantFulfillmentConfig
{
    /**
     * Permits multiple destinations per method type.
     *
     * @return object|null
     */
    function getAllowsMultiDestination(): object|null;

    /**
     * Allowed method type combinations.
     *
     * @return array[]|null
     */
    function getAllowsMethodCombinations(): array|null;
}
