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
 * Permits multiple destinations per method type.
 */
interface BusinessFulfillmentConfigAllowsMultiDestinationInterface
{
    public const KEY_SHIPPING = 'shipping';
    public const KEY_PICKUP = 'pickup';

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
}
