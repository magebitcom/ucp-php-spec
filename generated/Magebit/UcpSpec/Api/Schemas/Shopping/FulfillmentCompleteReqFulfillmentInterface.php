<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping;

use Magebit\UcpSpec\Api\Schemas\Shopping\Types\FulfillmentMethodCreateRequestInterface;

/**
 * Container for fulfillment methods and availability.
 *
 * Schema: Fulfillment Request
 */
interface FulfillmentCompleteReqFulfillmentInterface
{
    public const KEY_METHODS = 'methods';

    /**
     * Fulfillment methods for cart items.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\FulfillmentMethodCreateRequestInterface[]|null
     */
    public function getMethods(): array|null;
}
