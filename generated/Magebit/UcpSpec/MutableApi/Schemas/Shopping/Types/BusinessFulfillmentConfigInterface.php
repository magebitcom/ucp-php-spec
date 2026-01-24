<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

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
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BusinessFulfillmentConfigAllowsMultiDestinationInterface|null
     */
    public function getAllowsMultiDestination(): BusinessFulfillmentConfigAllowsMultiDestinationInterface|null;

    /**
     * Allowed method type combinations.
     *
     * @return array<array<string>>|null
     */
    public function getAllowsMethodCombinations(): array|null;

    /**
     * Permits multiple destinations per method type.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BusinessFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination
     * @return self
     */
    public function setAllowsMultiDestination(
        ?BusinessFulfillmentConfigAllowsMultiDestinationInterface $allowsMultiDestination,
    ): self;

    /**
     * Allowed method type combinations.
     *
     * @param array<array<string>>|null $allowsMethodCombinations
     * @return self
     */
    public function setAllowsMethodCombinations(?array $allowsMethodCombinations): self;
}
