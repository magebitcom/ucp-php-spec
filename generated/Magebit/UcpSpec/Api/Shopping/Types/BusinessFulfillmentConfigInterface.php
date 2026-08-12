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
 * Business's fulfillment configuration.
 *
 * Schema: Business Fulfillment Config
 */
interface BusinessFulfillmentConfigInterface
{
    public const KEY_ALLOWS_MULTI_DESTINATION = 'allows_multi_destination';
    public const KEY_ALLOWS_METHOD_COMBINATIONS = 'allows_method_combinations';

    /**
     * Permits multiple destinations per method type.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BusinessFulfillmentConfigAllowsMultiDestinationInterface|null
     */
    public function getAllowsMultiDestination(): BusinessFulfillmentConfigAllowsMultiDestinationInterface|null;

    /**
     * Permits multiple destinations per method type.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BusinessFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination
     * @return self
     */
    public function setAllowsMultiDestination(
        BusinessFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination,
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
