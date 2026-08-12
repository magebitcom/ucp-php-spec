<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\OrderCreateRequestFulfillmentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Fulfillment data: buyer expectations and what actually happened.
 */
class OrderCreateRequestFulfillment extends SpecObject implements OrderCreateRequestFulfillmentInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface[]|null
     */
    public function getExpectations(): array|null
    {
        return $this->instanceListOrNull(self::KEY_EXPECTATIONS, \Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface[]|null $expectations
     * @return self
     */
    public function setExpectations(array|null $expectations): self
    {
        return $this->set(self::KEY_EXPECTATIONS, $expectations);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface[]|null
     */
    public function getEvents(): array|null
    {
        return $this->instanceListOrNull(self::KEY_EVENTS, \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentEventInterface[]|null $events
     * @return self
     */
    public function setEvents(array|null $events): self
    {
        return $this->set(self::KEY_EVENTS, $events);
    }
}
