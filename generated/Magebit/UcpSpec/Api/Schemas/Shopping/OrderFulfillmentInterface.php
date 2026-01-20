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

use Magebit\UcpSpec\Api\Schemas\Shopping\Types\ExpectationInterface;
use Magebit\UcpSpec\Api\Schemas\Shopping\Types\FulfillmentEventInterface;

/**
 * Fulfillment data: buyer expectations and what actually happened.
 */
interface OrderFulfillmentInterface
{
    public const KEY_EXPECTATIONS = 'expectations';
    public const KEY_EVENTS = 'events';

    /**
     * Buyer-facing groups representing when/how items will be delivered. Can be split, merged, or adjusted post-order.
     *
     * @return ExpectationInterface[]|null
     */
    public function getExpectations(): array|null;

    /**
     * Append-only event log of actual shipments. Each event references line items by ID.
     *
     * @return FulfillmentEventInterface[]|null
     */
    public function getEvents(): array|null;
}
