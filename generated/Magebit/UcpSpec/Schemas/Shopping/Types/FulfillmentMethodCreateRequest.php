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
 * Schema: Fulfillment Method Create Request
 */
interface FulfillmentMethodCreateRequest
{
    /**
     * Fulfillment method type.
     *
     * @return string
     */
    function getType(): string;

    /**
     * Line item IDs fulfilled via this method.
     *
     * @return string[]|null
     */
    function getLineItemIds(): array|null;

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
     * @return FulfillmentGroupCreateRequest[]|null
     */
    function getGroups(): array|null;
}
