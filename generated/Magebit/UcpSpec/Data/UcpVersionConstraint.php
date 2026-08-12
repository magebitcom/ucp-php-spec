<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data;

use Magebit\UcpSpec\Api\UcpVersionConstraintInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Version range requirement with minimum and optional maximum.
 */
class UcpVersionConstraint extends SpecObject implements UcpVersionConstraintInterface
{
    /**
     * @return string
     */
    public function getMin(): string
    {
        return $this->requireString(self::KEY_MIN);
    }

    /**
     * @param string $min
     * @return self
     */
    public function setMin(string $min): self
    {
        return $this->set(self::KEY_MIN, $min);
    }

    /**
     * @return string|null
     */
    public function getMax(): string|null
    {
        return $this->stringOrNull(self::KEY_MAX);
    }

    /**
     * @param string|null $max
     * @return self
     */
    public function setMax(string|null $max): self
    {
        return $this->set(self::KEY_MAX, $max);
    }
}
