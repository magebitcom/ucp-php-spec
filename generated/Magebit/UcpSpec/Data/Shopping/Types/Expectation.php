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

use Magebit\UcpSpec\Api\Shopping\Types\ExpectationInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ExpectationLineItemsItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Buyer-facing fulfillment expectation representing logical groupings of items (e.g., 'package'). Can be split, merged, or adjusted post-order to set buyer expectations for when/how items arrive.
 */
class Expectation extends SpecObject implements ExpectationInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->requireString(self::KEY_ID);
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ExpectationLineItemsItemInterface[]
     */
    public function getLineItems(): array
    {
        return $this->instanceList(self::KEY_LINE_ITEMS, \Magebit\UcpSpec\Api\Shopping\Types\ExpectationLineItemsItemInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ExpectationLineItemsItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        return $this->set(self::KEY_LINE_ITEMS, $lineItems);
    }

    /**
     * @return string
     */
    public function getMethodType(): string
    {
        return $this->requireString(self::KEY_METHOD_TYPE);
    }

    /**
     * @param string $methodType
     * @return self
     */
    public function setMethodType(string $methodType): self
    {
        return $this->set(self::KEY_METHOD_TYPE, $methodType);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface
     */
    public function getDestination(): PostalAddressInterface
    {
        return $this->requireInstance(self::KEY_DESTINATION, \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface $destination
     * @return self
     */
    public function setDestination(PostalAddressInterface $destination): self
    {
        return $this->set(self::KEY_DESTINATION, $destination);
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

    /**
     * @return string|null
     */
    public function getFulfillableOn(): string|null
    {
        return $this->stringOrNull(self::KEY_FULFILLABLE_ON);
    }

    /**
     * @param string|null $fulfillableOn
     * @return self
     */
    public function setFulfillableOn(string|null $fulfillableOn): self
    {
        return $this->set(self::KEY_FULFILLABLE_ON, $fulfillableOn);
    }
}
