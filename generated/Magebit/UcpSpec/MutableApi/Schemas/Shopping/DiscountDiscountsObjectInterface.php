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
 * Discount codes input and applied discounts output.
 */
interface DiscountDiscountsObjectInterface
{
    public const KEY_CODES = 'codes';
    public const KEY_APPLIED = 'applied';

    /**
     * Discount codes to apply. Case-insensitive. Replaces previously submitted codes. Send empty array to clear.
     *
     * @return string[]|null
     */
    public function getCodes(): array|null;

    /**
     * Discounts successfully applied (code-based and automatic).
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\DiscountAppliedDiscountInterface[]|null
     */
    public function getApplied(): array|null;

    /**
     * Discount codes to apply. Case-insensitive. Replaces previously submitted codes. Send empty array to clear.
     *
     * @param string[]|null $codes
     * @return self
     */
    public function setCodes(?array $codes): self;

    /**
     * Discounts successfully applied (code-based and automatic).
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\DiscountAppliedDiscountInterface[]|null $applied
     * @return self
     */
    public function setApplied(?array $applied): self;
}
