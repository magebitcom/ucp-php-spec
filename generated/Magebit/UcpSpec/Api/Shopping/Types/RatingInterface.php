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
 * Product rating aggregate.
 *
 * Schema: Rating
 */
interface RatingInterface
{
    public const KEY_VALUE = 'value';
    public const KEY_SCALE_MIN = 'scale_min';
    public const KEY_SCALE_MAX = 'scale_max';
    public const KEY_COUNT = 'count';

    public const CONSTRAINTS = [
        'value' => ['minimum' => 0],
        'scale_min' => ['minimum' => 0],
        'scale_max' => ['minimum' => 1],
        'count' => ['minimum' => 0],
    ];

    /**
     * Average rating value.
     *
     * @return float
     */
    public function getValue(): float;

    /**
     * Average rating value.
     *
     * @param float $value
     * @return self
     */
    public function setValue(float $value): self;

    /**
     * Minimum value on the rating scale (e.g., 1 for 1-5 stars).
     *
     * @return float|null
     */
    public function getScaleMin(): float|null;

    /**
     * Minimum value on the rating scale (e.g., 1 for 1-5 stars).
     *
     * @param float|null $scaleMin
     * @return self
     */
    public function setScaleMin(float|null $scaleMin): self;

    /**
     * Maximum value on the rating scale (e.g., 5 for 5-star).
     *
     * @return float
     */
    public function getScaleMax(): float;

    /**
     * Maximum value on the rating scale (e.g., 5 for 5-star).
     *
     * @param float $scaleMax
     * @return self
     */
    public function setScaleMax(float $scaleMax): self;

    /**
     * Number of reviews contributing to the rating.
     *
     * @return int|null
     */
    public function getCount(): int|null;

    /**
     * Number of reviews contributing to the rating.
     *
     * @param int|null $count
     * @return self
     */
    public function setCount(int|null $count): self;
}
