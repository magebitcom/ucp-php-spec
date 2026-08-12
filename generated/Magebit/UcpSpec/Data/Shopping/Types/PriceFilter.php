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

use Magebit\UcpSpec\Api\Shopping\Types\PriceFilterInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Price range filter denominated in context.currency. When context.currency matches the presentment currency, businesses apply the filter directly. When it differs, businesses SHOULD convert filter values to the presentment currency before applying; if conversion is not supported, businesses MAY ignore the filter and SHOULD indicate this via a message. When context.currency is absent, filter denomination is ambiguous and businesses MAY ignore it.
 */
class PriceFilter extends SpecObject implements PriceFilterInterface
{
    /**
     * @return int|null
     */
    public function getMin(): int|null
    {
        return $this->intOrNull(self::KEY_MIN);
    }

    /**
     * @param int|null $min
     * @return self
     */
    public function setMin(int|null $min): self
    {
        return $this->set(self::KEY_MIN, $min);
    }

    /**
     * @return int|null
     */
    public function getMax(): int|null
    {
        return $this->intOrNull(self::KEY_MAX);
    }

    /**
     * @param int|null $max
     * @return self
     */
    public function setMax(int|null $max): self
    {
        return $this->set(self::KEY_MAX, $max);
    }
}
