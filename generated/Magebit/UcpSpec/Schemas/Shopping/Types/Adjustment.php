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
 * Append-only event that exists independently of fulfillment. Typically represents money movements but can be any post-order change. Polymorphic type that can optionally reference line items.
 */
interface Adjustment
{
    /**
     * Adjustment event identifier.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Type of adjustment (open string). Typically money-related like: refund, return, credit, price_adjustment, dispute, cancellation. Can be any value that makes sense for the merchant's business.
     *
     * @return string
     */
    function getType(): string;

    /**
     * RFC 3339 timestamp when this adjustment occurred.
     *
     * @return string
     */
    function getOccurredAt(): string;

    /**
     * Adjustment status.
     *
     * @return string
     */
    function getStatus(): string;

    /**
     * Which line items and quantities are affected (optional).
     *
     * @return object[]|null
     */
    function getLineItems(): array|null;

    /**
     * Amount in minor units (cents) for refunds, credits, price adjustments (optional).
     *
     * @return int|null
     */
    function getAmount(): int|null;

    /**
     * Human-readable reason or description (e.g., 'Defective item', 'Customer requested').
     *
     * @return string|null
     */
    function getDescription(): string|null;
}
