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

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentAvailableMethodResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Container for fulfillment methods and availability.
 */
class FulfillmentResponse extends SpecObject implements FulfillmentResponseInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodResponseInterface[]|null
     */
    public function getMethods(): array|null
    {
        return $this->instanceListOrNull(self::KEY_METHODS, \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodResponseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodResponseInterface[]|null $methods
     * @return self
     */
    public function setMethods(array|null $methods): self
    {
        return $this->set(self::KEY_METHODS, $methods);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentAvailableMethodResponseInterface[]|null
     */
    public function getAvailableMethods(): array|null
    {
        return $this->instanceListOrNull(self::KEY_AVAILABLE_METHODS, \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentAvailableMethodResponseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentAvailableMethodResponseInterface[]|null $availableMethods
     * @return self
     */
    public function setAvailableMethods(array|null $availableMethods): self
    {
        return $this->set(self::KEY_AVAILABLE_METHODS, $availableMethods);
    }
}
