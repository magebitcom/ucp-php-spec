<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

/**
 * Append-only event that exists independently of fulfillment. Typically represents money movements but can be any post-order change. Polymorphic type that can optionally reference line items.
 *
 * Schema: Adjustment
 */
interface AdjustmentInterface
{
    public const KEY_ID = 'id';
    public const KEY_TYPE = 'type';
    public const KEY_OCCURRED_AT = 'occurred_at';
    public const KEY_STATUS = 'status';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_AMOUNT = 'amount';
    public const KEY_DESCRIPTION = 'description';
    public const STATUS_PENDING = 'pending';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_FAILED = 'failed';

    /**
     * Adjustment event identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Type of adjustment (open string). Typically money-related like: refund, return, credit, price_adjustment, dispute, cancellation. Can be any value that makes sense for the merchant's business.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * RFC 3339 timestamp when this adjustment occurred.
     *
     * @return string
     */
    public function getOccurredAt(): string;

    /**
     * Adjustment status.
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Which line items and quantities are affected (optional).
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\AdjustmentLineItemsItemInterface[]|null
     */
    public function getLineItems(): array|null;

    /**
     * Amount in minor units (cents) for refunds, credits, price adjustments (optional).
     *
     * @return int|null
     */
    public function getAmount(): int|null;

    /**
     * Human-readable reason or description (e.g., 'Defective item', 'Customer requested').
     *
     * @return string|null
     */
    public function getDescription(): string|null;
}
