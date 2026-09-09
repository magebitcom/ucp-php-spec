<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api;

/**
 * Version range requirement with minimum and optional maximum.
 */
interface UcpVersionConstraintInterface
{
    public const KEY_MIN = 'min';
    public const KEY_MAX = 'max';

    public const CONSTRAINTS = [
        'min' => ['pattern' => '^\d{4}-\d{2}-\d{2}$'],
        'max' => ['pattern' => '^\d{4}-\d{2}-\d{2}$'],
    ];

    /**
     * Minimum required version (inclusive).
     *
     * @return string
     */
    public function getMin(): string;

    /**
     * Minimum required version (inclusive).
     *
     * @param string $min
     * @return self
     */
    public function setMin(string $min): self;

    /**
     * Maximum compatible version (inclusive). When absent, no upper bound.
     *
     * @return string|null
     */
    public function getMax(): string|null;

    /**
     * Maximum compatible version (inclusive). When absent, no upper bound.
     *
     * @param string|null $max
     * @return self
     */
    public function setMax(string|null $max): self;
}
