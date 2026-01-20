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
 * Schema: Fulfillment Method Update Request
 */
interface FulfillmentMethodUpdateRequestInterface
{
    /**
     * Unique fulfillment method identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Line item IDs fulfilled via this method.
     *
     * @return string[]
     */
    public function getLineItemIds(): array;

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
     * @return FulfillmentGroupUpdateRequestInterface[]|null
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
     * Line item IDs fulfilled via this method.
     *
     * @param string[] $line_item_ids
     * @return self
     */
    public function setLineItemIds(array $line_item_ids): self;

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
     * @param FulfillmentGroupUpdateRequestInterface[]|null $groups
     * @return self
     */
    public function setGroups(array|null $groups): self;
}
