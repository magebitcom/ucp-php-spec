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

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentAvailableMethodResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Inventory availability hint for a fulfillment method type.
 */
class FulfillmentAvailableMethodResponse extends SpecObject implements FulfillmentAvailableMethodResponseInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->requireString(self::KEY_TYPE);
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        return $this->set(self::KEY_TYPE, $type);
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
     * @return string|null
     */
    public function getFulfillableOn(): string|null
    {
        return $this->get(self::KEY_FULFILLABLE_ON);
    }

    /**
     * @param string|null $fulfillableOn
     * @return self
     */
    public function setFulfillableOn(string|null $fulfillableOn): self
    {
        return $this->set(self::KEY_FULFILLABLE_ON, $fulfillableOn);
    }

    /**
     * @return string|null
     */
    public function getDescription(): string|null
    {
        return $this->stringOrNull(self::KEY_DESCRIPTION);
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self
    {
        return $this->set(self::KEY_DESCRIPTION, $description);
    }
}
