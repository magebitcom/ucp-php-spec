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

use Magebit\UcpSpec\Api\Shopping\Types\OptionValueInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ProductOptionInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A product option such as size, color, or material.
 */
class ProductOption extends SpecObject implements ProductOptionInterface
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->requireString(self::KEY_NAME);
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        return $this->set(self::KEY_NAME, $name);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\OptionValueInterface[]
     */
    public function getValues(): array
    {
        return $this->instanceList(self::KEY_VALUES, \Magebit\UcpSpec\Api\Shopping\Types\OptionValueInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\OptionValueInterface[] $values
     * @return self
     */
    public function setValues(array $values): self
    {
        return $this->set(self::KEY_VALUES, $values);
    }
}
