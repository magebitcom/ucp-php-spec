<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentDestinationRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupCompleteRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentMethodCompleteRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A fulfillment method (shipping or pickup) with destinations and groups.
 */
class FulfillmentMethodCompleteRequest extends SpecObject implements FulfillmentMethodCompleteRequestInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->get(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->get(self::KEY_TYPE);
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        return $this->set(self::KEY_TYPE, $type);
    }

    /**
     * @return string[]
     */
    public function getLineItemIds(): array
    {
        return $this->getArray(self::KEY_LINE_ITEM_IDS);
    }

    /**
     * @param string[] $lineItemIds
     * @return self
     */
    public function setLineItemIds(array $lineItemIds): self
    {
        return $this->set(self::KEY_LINE_ITEM_IDS, $lineItemIds);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentDestinationRequestInterface[]|null
     */
    public function getDestinations(): array|null
    {
        return $this->get(self::KEY_DESTINATIONS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentDestinationRequestInterface[]|null $destinations
     * @return self
     */
    public function setDestinations(array|null $destinations): self
    {
        return $this->set(self::KEY_DESTINATIONS, $destinations);
    }

    /**
     * @return string|null
     */
    public function getSelectedDestinationId(): string|null
    {
        return $this->get(self::KEY_SELECTED_DESTINATION_ID);
    }

    /**
     * @param string|null $selectedDestinationId
     * @return self
     */
    public function setSelectedDestinationId(string|null $selectedDestinationId): self
    {
        return $this->set(self::KEY_SELECTED_DESTINATION_ID, $selectedDestinationId);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupCompleteRequestInterface[]|null
     */
    public function getGroups(): array|null
    {
        return $this->get(self::KEY_GROUPS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupCompleteRequestInterface[]|null $groups
     * @return self
     */
    public function setGroups(array|null $groups): self
    {
        return $this->set(self::KEY_GROUPS, $groups);
    }
}
