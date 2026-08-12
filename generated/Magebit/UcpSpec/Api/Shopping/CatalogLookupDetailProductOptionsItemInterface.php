<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

use Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface;

interface CatalogLookupDetailProductOptionsItemInterface
{
    public const KEY_NAME = 'name';
    public const KEY_VALUES = 'values';

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface[]
     */
    public function getValues(): array;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface[] $values
     * @return self
     */
    public function setValues(array $values): self;
}
