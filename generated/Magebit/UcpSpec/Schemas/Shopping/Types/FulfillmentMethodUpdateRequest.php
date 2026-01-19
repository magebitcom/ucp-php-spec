<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * A fulfillment method (shipping or pickup) with destinations and groups.
 *
 * Schema: Fulfillment Method Update Request
 */
interface FulfillmentMethodUpdateRequest
{
    /**
     * Unique fulfillment method identifier.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Line item IDs fulfilled via this method.
     *
     * @return string[]
     */
    function getLineItemIds(): array;

    /**
     * Available destinations. For shipping: addresses. For pickup: retail locations.
     *
     * @return FulfillmentDestinationRequest[]|null
     */
    function getDestinations(): array|null;

    /**
     * ID of the selected destination.
     *
     * @return string|null
     */
    function getSelectedDestinationId(): string|null;

    /**
     * Fulfillment groups for selecting options. Agent sets selected_option_id on groups to choose shipping method.
     *
     * @return FulfillmentGroupUpdateRequest[]|null
     */
    function getGroups(): array|null;
}
