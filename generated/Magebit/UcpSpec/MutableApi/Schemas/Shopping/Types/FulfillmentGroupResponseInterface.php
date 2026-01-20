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
 * Schema: Fulfillment Group Response
 */
interface FulfillmentGroupResponseInterface
{
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

    /**
     * Group identifier for referencing merchant-generated groups in updates.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Line item IDs included in this group/package.
     *
     * @param string[] $lineItemIds
     * @return self
     */
    public function setLineItemIds(array $lineItemIds): self;

    /**
     * Available fulfillment options for this group.
     *
     * @param FulfillmentOptionResponseInterface[]|null $options
     * @return self
     */
    public function setOptions(?array $options): self;

    /**
     * ID of the selected fulfillment option for this group.
     *
     * @param string|null $selectedOptionId
     * @return self
     */
    public function setSelectedOptionId(?string $selectedOptionId): self;
}
