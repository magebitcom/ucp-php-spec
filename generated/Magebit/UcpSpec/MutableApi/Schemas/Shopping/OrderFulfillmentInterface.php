<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ExpectationInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentEventInterface;

/**
 * Fulfillment data: buyer expectations and what actually happened.
 */
interface OrderFulfillmentInterface
{
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

    /**
     * Buyer-facing groups representing when/how items will be delivered. Can be split, merged, or adjusted post-order.
     *
     * @param ExpectationInterface[]|null $expectations
     * @return self
     */
    public function setExpectations(array|null $expectations): self;

    /**
     * Append-only event log of actual shipments. Each event references line items by ID.
     *
     * @param FulfillmentEventInterface[]|null $events
     * @return self
     */
    public function setEvents(array|null $events): self;
}
