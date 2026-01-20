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
 * Schema: Fulfillment Method Create Request
 */
interface FulfillmentMethodCreateRequestInterface
{
    public const TYPE_SHIPPING = 'shipping';
    public const TYPE_PICKUP = 'pickup';

    /**
     * Fulfillment method type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Line item IDs fulfilled via this method.
     *
     * @return string[]|null
     */
    public function getLineItemIds(): array|null;

    /**
     * Available destinations. For shipping: addresses. For pickup: retail locations.
     *
     * @return FulfillmentDestinationRequestInterface[]|null
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
     * @return FulfillmentGroupCreateRequestInterface[]|null
     */
    public function getGroups(): array|null;

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
     * @param string[]|null $line_item_ids
     * @return self
     */
    public function setLineItemIds(array|null $line_item_ids): self;

    /**
     * Available destinations. For shipping: addresses. For pickup: retail locations.
     *
     * @param FulfillmentDestinationRequestInterface[]|null $destinations
     * @return self
     */
    public function setDestinations(array|null $destinations): self;

    /**
     * ID of the selected destination.
     *
     * @param string|null $selected_destination_id
     * @return self
     */
    public function setSelectedDestinationId(string|null $selected_destination_id): self;

    /**
     * Fulfillment groups for selecting options. Agent sets selected_option_id on groups to choose shipping method.
     *
     * @param FulfillmentGroupCreateRequestInterface[]|null $groups
     * @return self
     */
    public function setGroups(array|null $groups): self;
}
