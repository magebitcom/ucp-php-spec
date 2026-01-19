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
 * Breakdown of how a discount amount was allocated to a specific target.
 */
interface Allocation
{
    /**
     * JSONPath to the allocation target (e.g., '$.line_items[0]', '$.totals.shipping').
     *
     * @return string
     */
    function getPath(): string;

    /**
     * Amount allocated to this target in minor (cents) currency units.
     *
     * @return int
     */
    function getAmount(): int;
}
