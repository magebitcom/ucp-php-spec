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
     * @return ExpectationLineItemsItemInterface[]
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
     * @return PostalAddressInterface
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
     * @param ExpectationLineItemsItemInterface[] $line_items
     * @return self
     */
    public function setLineItems(array $line_items): self;

    /**
     * Delivery method type (shipping, pickup, digital).
     *
     * @param string $method_type
     * @return self
     */
    public function setMethodType(string $method_type): self;

    /**
     * Delivery destination address.
     *
     * @param PostalAddressInterface $destination
     * @return self
     */
    public function setDestination(PostalAddressInterface $destination): self;

    /**
     * Human-readable delivery description (e.g., 'Arrives in 5-8 business days').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self;

    /**
     * When this expectation can be fulfilled: 'now' or ISO 8601 timestamp for future date (backorder, pre-order).
     *
     * @param string|null $fulfillable_on
     * @return self
     */
    public function setFulfillableOn(string|null $fulfillable_on): self;
}
