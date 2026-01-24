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
 * Breakdown of how a discount amount was allocated to a specific target.
 */
interface DiscountCompleteReqAllocationInterface
{
    public const KEY_PATH = 'path';
    public const KEY_AMOUNT = 'amount';

    /**
     * JSONPath to the allocation target (e.g., '$.line_items[0]', '$.totals.shipping').
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Amount allocated to this target in minor (cents) currency units.
     *
     * @return int
     */
    public function getAmount(): int;

    /**
     * JSONPath to the allocation target (e.g., '$.line_items[0]', '$.totals.shipping').
     *
     * @param string $path
     * @return self
     */
    public function setPath(string $path): self;

    /**
     * Amount allocated to this target in minor (cents) currency units.
     *
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self;
}
