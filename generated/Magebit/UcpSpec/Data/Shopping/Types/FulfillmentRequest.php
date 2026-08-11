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

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodCreateRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Container for fulfillment methods and availability.
 */
class FulfillmentRequest extends SpecObject implements FulfillmentRequestInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodCreateRequestInterface[]|null
     */
    public function getMethods(): array|null
    {
        return $this->instanceListOrNull(self::KEY_METHODS, \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodCreateRequestInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodCreateRequestInterface[]|null $methods
     * @return self
     */
    public function setMethods(array|null $methods): self
    {
        return $this->set(self::KEY_METHODS, $methods);
    }
}
