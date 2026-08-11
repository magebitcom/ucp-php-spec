<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentOptionResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A merchant-generated package/group of line items with fulfillment options.
 */
class FulfillmentGroupResponse extends SpecObject implements FulfillmentGroupResponseInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->get(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return string[]
     */
    public function getLineItemIds(): array
    {
        return $this->getArray(self::KEY_LINE_ITEM_IDS);
    }

    /**
     * @param string[] $lineItemIds
     * @return self
     */
    public function setLineItemIds(array $lineItemIds): self
    {
        return $this->set(self::KEY_LINE_ITEM_IDS, $lineItemIds);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentOptionResponseInterface[]|null
     */
    public function getOptions(): array|null
    {
        return $this->get(self::KEY_OPTIONS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\FulfillmentOptionResponseInterface[]|null $options
     * @return self
     */
    public function setOptions(array|null $options): self
    {
        return $this->set(self::KEY_OPTIONS, $options);
    }

    /**
     * @return string|null
     */
    public function getSelectedOptionId(): string|null
    {
        return $this->get(self::KEY_SELECTED_OPTION_ID);
    }

    /**
     * @param string|null $selectedOptionId
     * @return self
     */
    public function setSelectedOptionId(string|null $selectedOptionId): self
    {
        return $this->set(self::KEY_SELECTED_OPTION_ID, $selectedOptionId);
    }
}
