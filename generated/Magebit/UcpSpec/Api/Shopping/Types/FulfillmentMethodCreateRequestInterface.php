<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * A fulfillment method (shipping or pickup) with destinations and groups.
 *
 * Schema: Fulfillment Method Create Request
 */
interface FulfillmentMethodCreateRequestInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_LINE_ITEM_IDS = 'line_item_ids';
    public const KEY_DESTINATIONS = 'destinations';
    public const KEY_SELECTED_DESTINATION_ID = 'selected_destination_id';
    public const KEY_GROUPS = 'groups';
    public const TYPE_SHIPPING = 'shipping';
    public const TYPE_PICKUP = 'pickup';

    /**
     * Fulfillment method type.
     *
     * @return string
     */
    public function getType(): string;

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
     * @return string[]|null
     */
    public function getLineItemIds(): array|null;

    /**
     * Line item IDs fulfilled via this method.
     *
     * @param string[]|null $lineItemIds
     * @return self
     */
    public function setLineItemIds(array|null $lineItemIds): self;

    /**
     * Available destinations. For shipping: addresses. For pickup: retail locations.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentDestinationRequestInterface[]|null
     */
    public function getDestinations(): array|null;

    /**
     * Available destinations. For shipping: addresses. For pickup: retail locations.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentDestinationRequestInterface[]|null $destinations
     * @return self
     */
    public function setDestinations(array|null $destinations): self;

    /**
     * ID of the selected destination.
     *
     * @return string|null
     */
    public function getSelectedDestinationId(): string|null;

    /**
     * ID of the selected destination.
     *
     * @param string|null $selectedDestinationId
     * @return self
     */
    public function setSelectedDestinationId(string|null $selectedDestinationId): self;

    /**
     * Fulfillment groups for selecting options. Agent sets selected_option_id on groups to choose shipping method.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupCreateRequestInterface[]|null
     */
    public function getGroups(): array|null;

    /**
     * Fulfillment groups for selecting options. Agent sets selected_option_id on groups to choose shipping method.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupCreateRequestInterface[]|null $groups
     * @return self
     */
    public function setGroups(array|null $groups): self;
}
