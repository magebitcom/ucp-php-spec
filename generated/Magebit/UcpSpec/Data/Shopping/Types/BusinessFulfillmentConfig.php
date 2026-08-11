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

use Magebit\UcpSpec\Api\Shopping\Types\BusinessFulfillmentConfigAllowsMultiDestinationInterface;
use Magebit\UcpSpec\Api\Shopping\Types\BusinessFulfillmentConfigInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Business's fulfillment configuration.
 */
class BusinessFulfillmentConfig extends SpecObject implements BusinessFulfillmentConfigInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BusinessFulfillmentConfigAllowsMultiDestinationInterface|null
     */
    public function getAllowsMultiDestination(): BusinessFulfillmentConfigAllowsMultiDestinationInterface|null
    {
        return $this->get(self::KEY_ALLOWS_MULTI_DESTINATION);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BusinessFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination
     * @return self
     */
    public function setAllowsMultiDestination(
        BusinessFulfillmentConfigAllowsMultiDestinationInterface|null $allowsMultiDestination,
    ): self {
        return $this->set(self::KEY_ALLOWS_MULTI_DESTINATION, $allowsMultiDestination);
    }

    /**
     * @return array<string[]>|null
     */
    public function getAllowsMethodCombinations(): array|null
    {
        return $this->get(self::KEY_ALLOWS_METHOD_COMBINATIONS);
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
