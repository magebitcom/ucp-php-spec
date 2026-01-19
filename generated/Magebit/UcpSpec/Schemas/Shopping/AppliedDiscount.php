<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping;

/**
 * A discount that was successfully applied.
 */
interface AppliedDiscount
{
    /**
     * The discount code. Omitted for automatic discounts.
     *
     * @return string|null
     */
    function getCode(): string|null;

    /**
     * Human-readable discount name (e.g., 'Summer Sale 20% Off').
     *
     * @return string
     */
    function getTitle(): string;

    /**
     * Total discount amount in minor (cents) currency units.
     *
     * @return int
     */
    function getAmount(): int;

    /**
     * True if applied automatically by merchant rules (no code required).
     *
     * @return bool|null
     */
    function getAutomatic(): bool|null;

    /**
     * Allocation method. 'each' = applied independently per item. 'across' = split proportionally by value.
     *
     * @return string|null
     */
    function getMethod(): string|null;

    /**
     * Stacking order for discount calculation. Lower numbers applied first (1 = first).
     *
     * @return int|null
     */
    function getPriority(): int|null;

    /**
     * Breakdown of where this discount was allocated. Sum of allocation amounts equals total amount.
     *
     * @return Allocation[]|null
     */
    function getAllocations(): array|null;
}
