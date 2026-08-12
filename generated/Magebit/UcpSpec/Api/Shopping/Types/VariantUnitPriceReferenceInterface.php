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
 * Denominator for unit price display (e.g., per 100ml, per 1kg).
 */
interface VariantUnitPriceReferenceInterface
{
    public const KEY_VALUE = 'value';
    public const KEY_UNIT = 'unit';

    /**
     * Reference quantity.
     *
     * @return int
     */
    public function getValue(): int;

    /**
     * Reference quantity.
     *
     * @param int $value
     * @return self
     */
    public function setValue(int $value): self;

    /**
     * Unit of measurement.
     *
     * @return string
     */
    public function getUnit(): string;

    /**
     * Unit of measurement.
     *
     * @param string $unit
     * @return self
     */
    public function setUnit(string $unit): self;
}
