<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping;

/**
 * A discount that was successfully applied.
 */
interface DiscountCompleteReqAppliedDiscountInterface
{
    public const KEY_CODE = 'code';
    public const KEY_TITLE = 'title';
    public const KEY_AMOUNT = 'amount';
    public const KEY_AUTOMATIC = 'automatic';
    public const KEY_METHOD = 'method';
    public const KEY_PRIORITY = 'priority';
    public const KEY_ALLOCATIONS = 'allocations';
    public const METHOD_EACH = 'each';
    public const METHOD_ACROSS = 'across';

    /**
     * The discount code. Omitted for automatic discounts.
     *
     * @return string|null
     */
    public function getCode(): string|null;

    /**
     * Human-readable discount name (e.g., 'Summer Sale 20% Off').
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Total discount amount in minor (cents) currency units.
     *
     * @return int
     */
    public function getAmount(): int;

    /**
     * True if applied automatically by merchant rules (no code required).
     *
     * @return bool|null
     */
    public function getAutomatic(): bool|null;

    /**
     * Allocation method. 'each' = applied independently per item. 'across' = split proportionally by value.
     *
     * @return string|null
     */
    public function getMethod(): string|null;

    /**
     * Stacking order for discount calculation. Lower numbers applied first (1 = first).
     *
     * @return int|null
     */
    public function getPriority(): int|null;

    /**
     * Breakdown of where this discount was allocated. Sum of allocation amounts equals total amount.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\DiscountCompleteReqAllocationInterface[]|null
     */
    public function getAllocations(): array|null;
}
