<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MerchantFulfillmentConfigAllowsMultiDestinationInterface|null
     */
    public function getAllowsMultiDestination(): MerchantFulfillmentConfigAllowsMultiDestinationInterface|null;

    /**
     * Permits multiple destinations per method type.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MerchantFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination
     * @return self
     */
    public function setAllowsMultiDestination(
        MerchantFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination,
    ): self;

    /**
     * Allowed method type combinations.
     *
     * @return array<string[]>|null
     */
    public function getAllowsMethodCombinations(): array|null;

    /**
     * Allowed method type combinations.
     *
     * @param array<string[]>|null $allowsMethodCombinations
     * @return self
     */
    public function setAllowsMethodCombinations(array|null $allowsMethodCombinations): self;
}
