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
    /**
     * Expectation identifier.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Which line items and quantities are in this expectation.
     *
     * @return object[]
     */
    function getLineItems(): array;

    /**
     * Delivery method type (shipping, pickup, digital).
     *
     * @return string
     */
    function getMethodType(): string;

    /**
     * Delivery destination address.
     *
     * @return PostalAddress
     */
    function getDestination(): PostalAddress;

    /**
     * Human-readable delivery description (e.g., 'Arrives in 5-8 business days').
     *
     * @return string|null
     */
    function getDescription(): string|null;

    /**
     * When this expectation can be fulfilled: 'now' or ISO 8601 timestamp for future date (backorder, pre-order).
     *
     * @return string|null
     */
    function getFulfillableOn(): string|null;
}
