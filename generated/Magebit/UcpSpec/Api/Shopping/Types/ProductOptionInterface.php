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
 * A product option such as size, color, or material.
 *
 * Schema: Product Option
 */
interface ProductOptionInterface
{
    public const KEY_NAME = 'name';
    public const KEY_VALUES = 'values';

    /**
     * Option name (e.g., 'Size', 'Color').
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Option name (e.g., 'Size', 'Color').
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * Available values for this option.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OptionValueInterface[]
     */
    public function getValues(): array;

    /**
     * Available values for this option.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OptionValueInterface[] $values
     * @return self
     */
    public function setValues(array $values): self;
}
