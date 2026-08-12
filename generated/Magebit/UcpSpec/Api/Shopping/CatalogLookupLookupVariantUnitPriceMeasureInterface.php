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
 * Product quantity in packaging (e.g., 750ml bottle).
 */
interface CatalogLookupLookupVariantUnitPriceMeasureInterface
{
    public const KEY_VALUE = 'value';
    public const KEY_UNIT = 'unit';

    /**
     * Package quantity.
     *
     * @return float
     */
    public function getValue(): float;

    /**
     * Package quantity.
     *
     * @param float $value
     * @return self
     */
    public function setValue(float $value): self;

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
