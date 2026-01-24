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
 * Schema: Fulfillment Group Complete Request
 */
interface FulfillmentGroupCompleteRequestInterface
{
    public const KEY_ID = 'id';
    public const KEY_SELECTED_OPTION_ID = 'selected_option_id';

    /**
     * Group identifier for referencing merchant-generated groups in updates.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * ID of the selected fulfillment option for this group.
     *
     * @return string|null
     */
    public function getSelectedOptionId(): string|null;
}
