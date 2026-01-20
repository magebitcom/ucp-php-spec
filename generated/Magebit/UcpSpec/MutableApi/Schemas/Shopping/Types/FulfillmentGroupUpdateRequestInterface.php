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
 * A merchant-generated package/group of line items with fulfillment options.
 *
 * Schema: Fulfillment Group Update Request
 */
interface FulfillmentGroupUpdateRequestInterface
{
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

    /**
     * Group identifier for referencing merchant-generated groups in updates.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * ID of the selected fulfillment option for this group.
     *
     * @param string|null $selected_option_id
     * @return self
     */
    public function setSelectedOptionId(string|null $selected_option_id): self;
}
