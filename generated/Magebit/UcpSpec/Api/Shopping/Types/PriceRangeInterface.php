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
 * A price range representing minimum and maximum values (e.g., across product variants).
 *
 * Schema: Price Range
 */
interface PriceRangeInterface
{
    public const KEY_MIN = 'min';
    public const KEY_MAX = 'max';

    /**
     * Minimum price in the range.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface
     */
    public function getMin(): PriceInterface;

    /**
     * Minimum price in the range.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface $min
     * @return self
     */
    public function setMin(PriceInterface $min): self;

    /**
     * Maximum price in the range.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface
     */
    public function getMax(): PriceInterface;

    /**
     * Maximum price in the range.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface $max
     * @return self
     */
    public function setMax(PriceInterface $max): self;
}
