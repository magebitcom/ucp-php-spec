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

use Magebit\UcpSpec\Api\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantSellerInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Optional seller context for this variant.
 */
class VariantSeller extends SpecObject implements VariantSellerInterface
{
    /**
     * @return string|null
     */
    public function getName(): string|null
    {
        return $this->stringOrNull(self::KEY_NAME);
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(string|null $name): self
    {
        return $this->set(self::KEY_NAME, $name);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null
     */
    public function getLinks(): array|null
    {
        return $this->instanceListOrNull(self::KEY_LINKS, \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null $links
     * @return self
     */
    public function setLinks(array|null $links): self
    {
        return $this->set(self::KEY_LINKS, $links);
    }
}
