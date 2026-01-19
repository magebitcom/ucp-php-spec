<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Platform's fulfillment configuration.
 *
 * Schema: Platform Fulfillment Config
 */
interface PlatformFulfillmentConfig
{
    /**
     * Enables multiple groups per method.
     *
     * @return bool|null
     */
    public function getSupportsMultiGroup(): bool|null;
}
