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
 * Price range filter denominated in context.currency. When context.currency matches the presentment currency, businesses apply the filter directly. When it differs, businesses SHOULD convert filter values to the presentment currency before applying; if conversion is not supported, businesses MAY ignore the filter and SHOULD indicate this via a message. When context.currency is absent, filter denomination is ambiguous and businesses MAY ignore it.
 *
 * Schema: Price Filter
 */
interface PriceFilterInterface
{
    public const KEY_MIN = 'min';
    public const KEY_MAX = 'max';
    public const CONSTRAINTS = ['min' => ['minimum' => 0], 'max' => ['minimum' => 0]];

    /**
     * Minimum price in ISO 4217 minor units.
     *
     * @return int|null
     */
    public function getMin(): int|null;

    /**
     * Minimum price in ISO 4217 minor units.
     *
     * @param int|null $min
     * @return self
     */
    public function setMin(int|null $min): self;

    /**
     * Maximum price in ISO 4217 minor units.
     *
     * @return int|null
     */
    public function getMax(): int|null;

    /**
     * Maximum price in ISO 4217 minor units.
     *
     * @param int|null $max
     * @return self
     */
    public function setMax(int|null $max): self;
}
