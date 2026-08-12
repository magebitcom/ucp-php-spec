<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceMeasureInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Product quantity in packaging (e.g., 750ml bottle).
 */
class VariantUnitPriceMeasure extends SpecObject implements VariantUnitPriceMeasureInterface
{
    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->requireFloat(self::KEY_VALUE);
    }

    /**
     * @param float $value
     * @return self
     */
    public function setValue(float $value): self
    {
        return $this->set(self::KEY_VALUE, $value);
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->requireString(self::KEY_UNIT);
    }

    /**
     * @param string $unit
     * @return self
     */
    public function setUnit(string $unit): self
    {
        return $this->set(self::KEY_UNIT, $unit);
    }
}
