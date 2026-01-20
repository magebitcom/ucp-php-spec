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
 * Schema: Fulfillment Group Create Request
 */
interface FulfillmentGroupCreateRequestInterface
{
    /**
     * ID of the selected fulfillment option for this group.
     *
     * @return string|null
     */
    public function getSelectedOptionId(): string|null;

    /**
     * ID of the selected fulfillment option for this group.
     *
     * @param string|null $selectedOptionId
     * @return self
     */
    public function setSelectedOptionId(?string $selectedOptionId): self;
}
