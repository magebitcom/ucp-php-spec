<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\MerchantFulfillmentConfigAllowsMultiDestinationInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MerchantFulfillmentConfigInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Merchant's fulfillment configuration.
 */
class MerchantFulfillmentConfig extends SpecObject implements MerchantFulfillmentConfigInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MerchantFulfillmentConfigAllowsMultiDestinationInterface|null
     */
    public function getAllowsMultiDestination(): MerchantFulfillmentConfigAllowsMultiDestinationInterface|null
    {
        return $this->instanceOrNull(self::KEY_ALLOWS_MULTI_DESTINATION, \Magebit\UcpSpec\Api\Shopping\Types\MerchantFulfillmentConfigAllowsMultiDestinationInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MerchantFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination
     * @return self
     */
    public function setAllowsMultiDestination(
        MerchantFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination,
    ): self {
        return $this->set(self::KEY_ALLOWS_MULTI_DESTINATION, $allowsMultiDestination);
    }

    /**
     * @return array<string[]>|null
     */
    public function getAllowsMethodCombinations(): array|null
    {
        return $this->arrayOrNull(self::KEY_ALLOWS_METHOD_COMBINATIONS);
    }

    /**
     * @param array<string[]>|null $allowsMethodCombinations
     * @return self
     */
    public function setAllowsMethodCombinations(array|null $allowsMethodCombinations): self
    {
        return $this->set(self::KEY_ALLOWS_METHOD_COMBINATIONS, $allowsMethodCombinations);
    }
}
