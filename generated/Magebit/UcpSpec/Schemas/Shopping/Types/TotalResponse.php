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
 * Schema: Total Response
 */
interface TotalResponse
{
    /**
     * Type of total categorization.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Text to display against the amount. Should reflect appropriate method (e.g., 'Shipping', 'Delivery').
     *
     * @return string|null
     */
    public function getDisplayText(): string|null;

    /**
     * If type == total, sums subtotal - discount + fulfillment + tax + fee. Should be >= 0. Amount in minor (cents) currency units.
     *
     * @return int
     */
    public function getAmount(): int;
}
