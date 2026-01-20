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
 * Platform's fulfillment configuration.
 *
 * Schema: Platform Fulfillment Config
 */
interface PlatformFulfillmentConfigInterface
{
    public const KEY_SUPPORTS_MULTI_GROUP = 'supports_multi_group';

    /**
     * Enables multiple groups per method.
     *
     * @return bool|null
     */
    public function getSupportsMultiGroup(): bool|null;
}
