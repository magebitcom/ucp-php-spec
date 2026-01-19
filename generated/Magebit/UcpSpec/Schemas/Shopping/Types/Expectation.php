<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Buyer-facing fulfillment expectation representing logical groupings of items (e.g., 'package'). Can be split, merged, or adjusted post-order to set buyer expectations for when/how items arrive.
 */
interface Expectation
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
     * @return object[]
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
     * @return PostalAddress
     */
    public function getDestination(): PostalAddress;

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
}
