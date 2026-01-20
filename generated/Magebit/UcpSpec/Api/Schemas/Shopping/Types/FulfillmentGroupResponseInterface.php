<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

/**
 * A merchant-generated package/group of line items with fulfillment options.
 *
 * Schema: Fulfillment Group Response
 */
interface FulfillmentGroupResponseInterface
{
    public const KEY_ID = 'id';
    public const KEY_LINE_ITEM_IDS = 'line_item_ids';
    public const KEY_OPTIONS = 'options';
    public const KEY_SELECTED_OPTION_ID = 'selected_option_id';

    /**
     * Group identifier for referencing merchant-generated groups in updates.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Line item IDs included in this group/package.
     *
     * @return string[]
     */
    public function getLineItemIds(): array;

    /**
     * Available fulfillment options for this group.
     *
     * @return FulfillmentOptionResponseInterface[]|null
     */
    public function getOptions(): array|null;

    /**
     * ID of the selected fulfillment option for this group.
     *
     * @return string|null
     */
    public function getSelectedOptionId(): string|null;
}
