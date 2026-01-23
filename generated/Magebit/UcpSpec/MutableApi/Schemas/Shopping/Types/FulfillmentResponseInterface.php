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
    public const KEY_METHODS = 'methods';
    public const KEY_AVAILABLE_METHODS = 'available_methods';

    /**
     * Fulfillment methods for cart items.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentMethodResponseInterface[]|null
     */
    public function getMethods(): array|null;

    /**
     * Inventory availability hints.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentAvailableMethodResponseInterface[]|null
     */
    public function getAvailableMethods(): array|null;

    /**
     * Fulfillment methods for cart items.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentMethodResponseInterface[]|null $methods
     * @return self
     */
    public function setMethods(?array $methods): self;

    /**
     * Inventory availability hints.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentAvailableMethodResponseInterface[]|null $availableMethods
     * @return self
     */
    public function setAvailableMethods(?array $availableMethods): self;
}
