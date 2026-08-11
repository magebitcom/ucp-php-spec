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

use Magebit\UcpSpec\Api\Shopping\Types\PlatformFulfillmentConfigInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Platform's fulfillment configuration.
 */
class PlatformFulfillmentConfig extends SpecObject implements PlatformFulfillmentConfigInterface
{
    /**
     * @return bool|null
     */
    public function getSupportsMultiGroup(): bool|null
    {
        return $this->get(self::KEY_SUPPORTS_MULTI_GROUP);
    }

    /**
     * @param bool|null $supportsMultiGroup
     * @return self
     */
    public function setSupportsMultiGroup(bool|null $supportsMultiGroup): self
    {
        return $this->set(self::KEY_SUPPORTS_MULTI_GROUP, $supportsMultiGroup);
    }
}
