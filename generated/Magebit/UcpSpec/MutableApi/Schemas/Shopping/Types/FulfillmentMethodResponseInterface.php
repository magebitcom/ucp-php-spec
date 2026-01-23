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
 * A fulfillment method (shipping or pickup) with destinations and groups.
 *
 * Schema: Fulfillment Method Response
 */
interface FulfillmentMethodResponseInterface
{
    public const KEY_ID = 'id';
    public const KEY_TYPE = 'type';
    public const KEY_LINE_ITEM_IDS = 'line_item_ids';
    public const KEY_DESTINATIONS = 'destinations';
    public const KEY_SELECTED_DESTINATION_ID = 'selected_destination_id';
    public const KEY_GROUPS = 'groups';
    public const TYPE_SHIPPING = 'shipping';
    public const TYPE_PICKUP = 'pickup';

    /**
     * Unique fulfillment method identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Fulfillment method type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Line item IDs fulfilled via this method.
     *
     * @return string[]
     */
    public function getLineItemIds(): array;

    /**
     * Available destinations. For shipping: addresses. For pickup: retail locations.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentDestinationResponseInterface[]|null
     */
    public function getDestinations(): array|null;

    /**
     * ID of the selected destination.
     *
     * @return string|null
     */
    public function getSelectedDestinationId(): string|null;

    /**
     * Fulfillment groups for selecting options. Agent sets selected_option_id on groups to choose shipping method.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentGroupResponseInterface[]|null
     */
    public function getGroups(): array|null;

    /**
     * Unique fulfillment method identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Fulfillment method type.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Line item IDs fulfilled via this method.
     *
     * @param string[] $lineItemIds
     * @return self
     */
    public function setLineItemIds(array $lineItemIds): self;

    /**
     * Available destinations. For shipping: addresses. For pickup: retail locations.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentDestinationResponseInterface[]|null $destinations
     * @return self
     */
    public function setDestinations(?array $destinations): self;

    /**
     * ID of the selected destination.
     *
     * @param string|null $selectedDestinationId
     * @return self
     */
    public function setSelectedDestinationId(?string $selectedDestinationId): self;

    /**
     * Fulfillment groups for selecting options. Agent sets selected_option_id on groups to choose shipping method.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\FulfillmentGroupResponseInterface[]|null $groups
     * @return self
     */
    public function setGroups(?array $groups): self;
}
