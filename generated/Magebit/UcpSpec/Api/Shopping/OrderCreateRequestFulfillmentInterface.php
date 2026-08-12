<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

use Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface;

/**
 * Fulfillment data: buyer expectations and what actually happened.
 */
interface OrderCreateRequestFulfillmentInterface
{
    public const KEY_EXPECTATIONS = 'expectations';
    public const KEY_EVENTS = 'events';

    /**
     * Buyer-facing groups representing when/how items will be delivered. Can be split, merged, or adjusted post-order.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface[]|null
     */
    public function getExpectations(): array|null;

    /**
     * Buyer-facing groups representing when/how items will be delivered. Can be split, merged, or adjusted post-order.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface[]|null $expectations
     * @return self
     */
    public function setExpectations(array|null $expectations): self;

    /**
     * Append-only event log of actual shipments. Each event references line items by ID.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface[]|null
     */
    public function getEvents(): array|null;

    /**
     * Append-only event log of actual shipments. Each event references line items by ID.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface[]|null $events
     * @return self
     */
    public function setEvents(array|null $events): self;
}
