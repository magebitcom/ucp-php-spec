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

use Magebit\UcpSpec\Api\Shopping\Types\PriceInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A price range representing minimum and maximum values (e.g., across product variants).
 */
class PriceRange extends SpecObject implements PriceRangeInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface
     */
    public function getMin(): PriceInterface
    {
        return $this->requireInstance(self::KEY_MIN, \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface $min
     * @return self
     */
    public function setMin(PriceInterface $min): self
    {
        return $this->set(self::KEY_MIN, $min);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface
     */
    public function getMax(): PriceInterface
    {
        return $this->requireInstance(self::KEY_MAX, \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface $max
     * @return self
     */
    public function setMax(PriceInterface $max): self
    {
        return $this->set(self::KEY_MAX, $max);
    }
}
