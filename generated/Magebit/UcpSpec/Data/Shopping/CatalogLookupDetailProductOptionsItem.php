<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductOptionsItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class CatalogLookupDetailProductOptionsItem extends SpecObject implements CatalogLookupDetailProductOptionsItemInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface[]
     */
    public function getValues(): array
    {
        return $this->instanceList(self::KEY_VALUES, \Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface[] $values
     * @return self
     */
    public function setValues(array $values): self
    {
        return $this->set(self::KEY_VALUES, $values);
    }
}
