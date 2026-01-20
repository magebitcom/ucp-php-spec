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
    public const KEY_ALLOWS_MULTI_DESTINATION = 'allows_multi_destination';
    public const KEY_ALLOWS_METHOD_COMBINATIONS = 'allows_method_combinations';

    /**
     * Permits multiple destinations per method type.
     *
     * @return MerchantFulfillmentConfigAllowsMultiDestinationInterface|null
     */
    public function getAllowsMultiDestination(): MerchantFulfillmentConfigAllowsMultiDestinationInterface|null;

    /**
     * Allowed method type combinations.
     *
     * @return array[]|null
     */
    public function getAllowsMethodCombinations(): array|null;
}
