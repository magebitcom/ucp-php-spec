<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * Post-order event that exists independently of fulfillment. Typically represents money movements but can be any post-order change. Polymorphic type that can optionally reference line items.
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
    public const KEY_TOTALS = 'totals';
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
     * Adjustment event identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Type of adjustment (open string). Typically money-related like: refund, return, credit, price_adjustment, dispute, cancellation. Can be any value that makes sense for the merchant's business.
     *
     * @return string
     */
    public function getType(): string;

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
     * @return string
     */
    public function getOccurredAt(): string;

    /**
     * RFC 3339 timestamp when this adjustment occurred.
     *
     * @param string $occurredAt
     * @return self
     */
    public function setOccurredAt(string $occurredAt): self;

    /**
     * Adjustment status.
     *
     * @return string
     */
    public function getStatus(): string;

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentLineItemsItemInterface[]|null
     */
    public function getLineItems(): array|null;

    /**
     * Which line items and quantities are affected (optional).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\AdjustmentLineItemsItemInterface[]|null $lineItems
     * @return self
     */
    public function setLineItems(array|null $lineItems): self;

    /**
     * Adjustment totals breakdown. Signed values - negative for money returned to buyer (refunds, credits), positive for additional charges (exchanges).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]|null
     */
    public function getTotals(): array|null;

    /**
     * Adjustment totals breakdown. Signed values - negative for money returned to buyer (refunds, credits), positive for additional charges (exchanges).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]|null $totals
     * @return self
     */
    public function setTotals(array|null $totals): self;

    /**
     * Human-readable reason or description (e.g., 'Defective item', 'Customer requested').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * Human-readable reason or description (e.g., 'Defective item', 'Customer requested').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self;
}
