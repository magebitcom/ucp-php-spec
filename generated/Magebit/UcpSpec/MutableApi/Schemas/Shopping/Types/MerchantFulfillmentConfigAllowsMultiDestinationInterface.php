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
 * Permits multiple destinations per method type.
 */
interface MerchantFulfillmentConfigAllowsMultiDestinationInterface
{
    /**
     * Multiple shipping destinations allowed.
     *
     * @return bool|null
     */
    public function getShipping(): bool|null;

    /**
     * Multiple pickup locations allowed.
     *
     * @return bool|null
     */
    public function getPickup(): bool|null;

    /**
     * Multiple shipping destinations allowed.
     *
     * @param bool|null $shipping
     * @return self
     */
    public function setShipping(bool|null $shipping): self;

    /**
     * Multiple pickup locations allowed.
     *
     * @param bool|null $pickup
     * @return self
     */
    public function setPickup(bool|null $pickup): self;
}
