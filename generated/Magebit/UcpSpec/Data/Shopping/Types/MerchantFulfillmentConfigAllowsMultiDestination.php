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
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Permits multiple destinations per method type.
 */
class MerchantFulfillmentConfigAllowsMultiDestination extends SpecObject implements MerchantFulfillmentConfigAllowsMultiDestinationInterface
{
    /**
     * @return bool|null
     */
    public function getShipping(): bool|null
    {
        return $this->boolOrNull(self::KEY_SHIPPING);
    }

    /**
     * @param bool|null $shipping
     * @return self
     */
    public function setShipping(bool|null $shipping): self
    {
        return $this->set(self::KEY_SHIPPING, $shipping);
    }

    /**
     * @return bool|null
     */
    public function getPickup(): bool|null
    {
        return $this->boolOrNull(self::KEY_PICKUP);
    }

    /**
     * @param bool|null $pickup
     * @return self
     */
    public function setPickup(bool|null $pickup): self
    {
        return $this->set(self::KEY_PICKUP, $pickup);
    }
}
