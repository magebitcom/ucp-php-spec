<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

/**
 * A discount that was successfully applied.
 */
interface DiscountAppliedDiscountInterface
{
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
     * @return DiscountAllocationInterface[]|null
     */
    public function getAllocations(): array|null;

    /**
     * The discount code. Omitted for automatic discounts.
     *
     * @param string|null $code
     * @return self
     */
    public function setCode(string|null $code): self;

    /**
     * Human-readable discount name (e.g., 'Summer Sale 20% Off').
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self;

    /**
     * Total discount amount in minor (cents) currency units.
     *
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self;

    /**
     * True if applied automatically by merchant rules (no code required).
     *
     * @param bool|null $automatic
     * @return self
     */
    public function setAutomatic(bool|null $automatic): self;

    /**
     * Allocation method. 'each' = applied independently per item. 'across' = split proportionally by value.
     *
     * @param string|null $method
     * @return self
     */
    public function setMethod(string|null $method): self;

    /**
     * Stacking order for discount calculation. Lower numbers applied first (1 = first).
     *
     * @param int|null $priority
     * @return self
     */
    public function setPriority(int|null $priority): self;

    /**
     * Breakdown of where this discount was allocated. Sum of allocation amounts equals total amount.
     *
     * @param DiscountAllocationInterface[]|null $allocations
     * @return self
     */
    public function setAllocations(array|null $allocations): self;
}
