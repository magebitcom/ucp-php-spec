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
 * Discount codes input and applied discounts output.
 */
interface DiscountDiscountsObjectInterface
{
    /**
     * Discount codes to apply. Case-insensitive. Replaces previously submitted codes. Send empty array to clear.
     *
     * @return string[]|null
     */
    public function getCodes(): array|null;

    /**
     * Discounts successfully applied (code-based and automatic).
     *
     * @return DiscountAppliedDiscountInterface[]|null
     */
    public function getApplied(): array|null;
}
