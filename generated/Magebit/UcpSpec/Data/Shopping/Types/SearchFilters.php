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
use Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Filter criteria to narrow search results. All specified filters combine with AND logic.
 */
class SearchFilters extends SpecObject implements SearchFiltersInterface
{
    /**
     * @return string[]|null
     */
    public function getCategories(): array|null
    {
        return $this->arrayOrNull(self::KEY_CATEGORIES);
    }

    /**
     * @param string[]|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self
    {
        return $this->set(self::KEY_CATEGORIES, $categories);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceFilterInterface|null
     */
    public function getPrice(): PriceFilterInterface|null
    {
        return $this->instanceOrNull(self::KEY_PRICE, \Magebit\UcpSpec\Api\Shopping\Types\PriceFilterInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceFilterInterface|null $price
     * @return self
     */
    public function setPrice(PriceFilterInterface|null $price): self
    {
        return $this->set(self::KEY_PRICE, $price);
    }
}
