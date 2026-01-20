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
 * Schema: Fulfillment Response
 */
interface FulfillmentResponseInterface
{
    /**
     * Fulfillment methods for cart items.
     *
     * @return FulfillmentMethodResponseInterface[]|null
     */
    public function getMethods(): array|null;

    /**
     * Inventory availability hints.
     *
     * @return FulfillmentAvailableMethodResponseInterface[]|null
     */
    public function getAvailableMethods(): array|null;

    /**
     * Fulfillment methods for cart items.
     *
     * @param FulfillmentMethodResponseInterface[]|null $methods
     * @return self
     */
    public function setMethods(?array $methods): self;

    /**
     * Inventory availability hints.
     *
     * @param FulfillmentAvailableMethodResponseInterface[]|null $availableMethods
     * @return self
     */
    public function setAvailableMethods(?array $availableMethods): self;
}
