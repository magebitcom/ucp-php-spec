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
 * Buyer-facing fulfillment expectation representing logical groupings of items (e.g., 'package'). Can be split, merged, or adjusted post-order to set buyer expectations for when/how items arrive.
 *
 * Schema: Expectation
 */
interface ExpectationInterface
{
    public const KEY_ID = 'id';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_METHOD_TYPE = 'method_type';
    public const KEY_DESTINATION = 'destination';
    public const KEY_DESCRIPTION = 'description';
    public const KEY_FULFILLABLE_ON = 'fulfillable_on';
    public const METHOD_TYPE_SHIPPING = 'shipping';
    public const METHOD_TYPE_PICKUP = 'pickup';
    public const METHOD_TYPE_DIGITAL = 'digital';

    /**
     * Expectation identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Which line items and quantities are in this expectation.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ExpectationLineItemsItemInterface[]
     */
    public function getLineItems(): array;

    /**
     * Delivery method type (shipping, pickup, digital).
     *
     * @return string
     */
    public function getMethodType(): string;

    /**
     * Delivery destination address.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PostalAddressInterface
     */
    public function getDestination(): PostalAddressInterface;

    /**
     * Human-readable delivery description (e.g., 'Arrives in 5-8 business days').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * When this expectation can be fulfilled: 'now' or ISO 8601 timestamp for future date (backorder, pre-order).
     *
     * @return string|null
     */
    public function getFulfillableOn(): string|null;

    /**
     * Expectation identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Which line items and quantities are in this expectation.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ExpectationLineItemsItemInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Delivery method type (shipping, pickup, digital).
     *
     * @param string $methodType
     * @return self
     */
    public function setMethodType(string $methodType): self;

    /**
     * Delivery destination address.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PostalAddressInterface $destination
     * @return self
     */
    public function setDestination(PostalAddressInterface $destination): self;

    /**
     * Human-readable delivery description (e.g., 'Arrives in 5-8 business days').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(?string $description): self;

    /**
     * When this expectation can be fulfilled: 'now' or ISO 8601 timestamp for future date (backorder, pre-order).
     *
     * @param string|null $fulfillableOn
     * @return self
     */
    public function setFulfillableOn(?string $fulfillableOn): self;
}
