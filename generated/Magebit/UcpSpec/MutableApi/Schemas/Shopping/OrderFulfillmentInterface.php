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
    public const KEY_EXPECTATIONS = 'expectations';
    public const KEY_EVENTS = 'events';

    /**
     * Buyer-facing groups representing when/how items will be delivered. Can be split, merged, or adjusted post-order.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ExpectationInterface[]|null
     */
    public function getExpectations(): array|null;

    /**
     * Append-only event log of actual shipments. Each event references line items by ID.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentEventInterface[]|null
     */
    public function getEvents(): array|null;

    /**
     * Buyer-facing groups representing when/how items will be delivered. Can be split, merged, or adjusted post-order.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ExpectationInterface[]|null $expectations
     * @return self
     */
    public function setExpectations(?array $expectations): self;

    /**
     * Append-only event log of actual shipments. Each event references line items by ID.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentEventInterface[]|null $events
     * @return self
     */
    public function setEvents(?array $events): self;
}
