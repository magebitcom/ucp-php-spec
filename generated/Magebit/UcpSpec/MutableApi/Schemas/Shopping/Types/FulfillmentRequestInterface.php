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
 * Container for fulfillment methods and availability.
 *
 * Schema: Fulfillment Request
 */
interface FulfillmentRequestInterface
{
    /**
     * Fulfillment methods for cart items.
     *
     * @return FulfillmentMethodCreateRequestInterface[]|null
     */
    public function getMethods(): array|null;

    /**
     * Fulfillment methods for cart items.
     *
     * @param FulfillmentMethodCreateRequestInterface[]|null $methods
     * @return self
     */
    public function setMethods(array|null $methods): self;
}
