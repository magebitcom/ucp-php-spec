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
 * Merchant's fulfillment configuration.
 *
 * Schema: Merchant Fulfillment Config
 */
interface MerchantFulfillmentConfigInterface
{
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

    /**
     * Permits multiple destinations per method type.
     *
     * @param MerchantFulfillmentConfigAllowsMultiDestinationInterface|null $allows_multi_destination
     * @return self
     */
    public function setAllowsMultiDestination(
        MerchantFulfillmentConfigAllowsMultiDestinationInterface|null $allows_multi_destination,
    ): self;

    /**
     * Allowed method type combinations.
     *
     * @param array[]|null $allows_method_combinations
     * @return self
     */
    public function setAllowsMethodCombinations(array|null $allows_method_combinations): self;
}
