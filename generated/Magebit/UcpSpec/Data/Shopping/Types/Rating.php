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

use Magebit\UcpSpec\Api\Shopping\Types\RatingInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Product rating aggregate.
 */
class Rating extends SpecObject implements RatingInterface
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
     * @return float|null
     */
    public function getScaleMin(): float|null
    {
        return $this->floatOrNull(self::KEY_SCALE_MIN);
    }

    /**
     * @param float|null $scaleMin
     * @return self
     */
    public function setScaleMin(float|null $scaleMin): self
    {
        return $this->set(self::KEY_SCALE_MIN, $scaleMin);
    }

    /**
     * @return float
     */
    public function getScaleMax(): float
    {
        return $this->requireFloat(self::KEY_SCALE_MAX);
    }

    /**
     * @param float $scaleMax
     * @return self
     */
    public function setScaleMax(float $scaleMax): self
    {
        return $this->set(self::KEY_SCALE_MAX, $scaleMax);
    }

    /**
     * @return int|null
     */
    public function getCount(): int|null
    {
        return $this->intOrNull(self::KEY_COUNT);
    }

    /**
     * @param int|null $count
     * @return self
     */
    public function setCount(int|null $count): self
    {
        return $this->set(self::KEY_COUNT, $count);
    }
}
