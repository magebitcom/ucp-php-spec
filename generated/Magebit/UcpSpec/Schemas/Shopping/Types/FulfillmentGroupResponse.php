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
 * A merchant-generated package/group of line items with fulfillment options.
 *
 * Schema: Fulfillment Group Response
 */
interface FulfillmentGroupResponse
{
    /**
     * Group identifier for referencing merchant-generated groups in updates.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Line item IDs included in this group/package.
     *
     * @return string[]
     */
    function getLineItemIds(): array;

    /**
     * Available fulfillment options for this group.
     *
     * @return FulfillmentOptionResponse[]|null
     */
    function getOptions(): array|null;

    /**
     * ID of the selected fulfillment option for this group.
     *
     * @return string|null
     */
    function getSelectedOptionId(): string|null;
}
