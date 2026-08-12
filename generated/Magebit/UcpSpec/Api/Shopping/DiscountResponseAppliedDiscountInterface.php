<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

/**
 * A discount that was successfully applied.
 */
interface DiscountResponseAppliedDiscountInterface
{
    public const KEY_CODE = 'code';
    public const KEY_TITLE = 'title';
    public const KEY_AMOUNT = 'amount';
    public const KEY_AUTOMATIC = 'automatic';
    public const KEY_METHOD = 'method';
    public const KEY_PRIORITY = 'priority';
    public const KEY_PROVISIONAL = 'provisional';
    public const KEY_ELIGIBILITY = 'eligibility';
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
     * The discount code. Omitted for automatic discounts.
     *
     * @param string|null $code
     * @return self
     */
    public function setCode(string|null $code): self;

    /**
     * Human-readable discount name (e.g., 'Summer Sale 20% Off').
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Human-readable discount name (e.g., 'Summer Sale 20% Off').
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self;

    /**
     * Total discount amount in ISO 4217 minor units.
     *
     * @return int
     */
    public function getAmount(): int;

    /**
     * Total discount amount in ISO 4217 minor units.
     *
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self;

    /**
     * True if applied automatically by merchant rules (no code required).
     *
     * @return bool|null
     */
    public function getAutomatic(): bool|null;

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
     * @return string|null
     */
    public function getMethod(): string|null;

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
     * @return int|null
     */
    public function getPriority(): int|null;

    /**
     * Stacking order for discount calculation. Lower numbers applied first (1 = first).
     *
     * @param int|null $priority
     * @return self
     */
    public function setPriority(int|null $priority): self;

    /**
     * True if this discount requires additional verification.
     *
     * @return bool|null
     */
    public function getProvisional(): bool|null;

    /**
     * True if this discount requires additional verification.
     *
     * @param bool|null $provisional
     * @return self
     */
    public function setProvisional(bool|null $provisional): self;

    /**
     * The eligibility claim accepted by the Business for this discount. Corresponds to a value from context.eligibility. Omitted for code-based and non-eligibility automatic discounts.
     *
     * @return string|null
     */
    public function getEligibility(): string|null;

    /**
     * The eligibility claim accepted by the Business for this discount. Corresponds to a value from context.eligibility. Omitted for code-based and non-eligibility automatic discounts.
     *
     * @param string|null $eligibility
     * @return self
     */
    public function setEligibility(string|null $eligibility): self;

    /**
     * Breakdown of where this discount was allocated. Sum of allocation amounts equals total amount.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountResponseAllocationInterface[]|null
     */
    public function getAllocations(): array|null;

    /**
     * Breakdown of where this discount was allocated. Sum of allocation amounts equals total amount.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountResponseAllocationInterface[]|null $allocations
     * @return self
     */
    public function setAllocations(array|null $allocations): self;
}
