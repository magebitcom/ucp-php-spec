<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

/**
 * Merchant's fulfillment configuration.
 *
 * Schema: Merchant Fulfillment Config
 */
interface MerchantFulfillmentConfigInterface
{
    /**
     * Permits multiple destinations per method type.
     *
     * @return object|null
     */
    public function getAllowsMultiDestination(): object|null;

    /**
     * Allowed method type combinations.
     *
     * @return array[]|null
     */
    public function getAllowsMethodCombinations(): array|null;
}
