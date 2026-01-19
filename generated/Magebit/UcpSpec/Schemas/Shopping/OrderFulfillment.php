<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping;

use Magebit\UcpSpec\Schemas\Shopping\Types\Expectation;
use Magebit\UcpSpec\Schemas\Shopping\Types\FulfillmentEvent;

/**
 * Fulfillment data: buyer expectations and what actually happened.
 */
interface OrderFulfillment
{
    /**
     * Buyer-facing groups representing when/how items will be delivered. Can be split, merged, or adjusted post-order.
     *
     * @return Expectation[]|null
     */
    public function getExpectations(): array|null;

    /**
     * Append-only event log of actual shipments. Each event references line items by ID.
     *
     * @return FulfillmentEvent[]|null
     */
    public function getEvents(): array|null;
}
