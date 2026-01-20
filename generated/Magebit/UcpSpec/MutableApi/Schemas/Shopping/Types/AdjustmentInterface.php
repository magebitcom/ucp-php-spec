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
 * Append-only event that exists independently of fulfillment. Typically represents money movements but can be any post-order change. Polymorphic type that can optionally reference line items.
 *
 * Schema: Adjustment
 */
interface AdjustmentInterface
{
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
     * @return AdjustmentLineItemsItemInterface[]|null
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

    /**
     * Adjustment event identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Type of adjustment (open string). Typically money-related like: refund, return, credit, price_adjustment, dispute, cancellation. Can be any value that makes sense for the merchant's business.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * RFC 3339 timestamp when this adjustment occurred.
     *
     * @param string $occurred_at
     * @return self
     */
    public function setOccurredAt(string $occurred_at): self;

    /**
     * Adjustment status.
     *
     * @param string $status
     * @return self
     */
    public function setStatus(string $status): self;

    /**
     * Which line items and quantities are affected (optional).
     *
     * @param AdjustmentLineItemsItemInterface[]|null $line_items
     * @return self
     */
    public function setLineItems(array|null $line_items): self;

    /**
     * Amount in minor units (cents) for refunds, credits, price adjustments (optional).
     *
     * @param int|null $amount
     * @return self
     */
    public function setAmount(int|null $amount): self;

    /**
     * Human-readable reason or description (e.g., 'Defective item', 'Customer requested').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self;
}
