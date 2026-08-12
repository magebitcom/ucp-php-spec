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
 * Filter criteria to narrow search results. All specified filters combine with AND logic.
 *
 * Schema: Search Filters
 */
interface SearchFiltersInterface
{
    public const KEY_CATEGORIES = 'categories';
    public const KEY_PRICE = 'price';

    /**
     * Filter by product categories (OR logic — matches products in any listed categories). Values match against the value field in product category entries. Valid values can be discovered from the categories field in search results, merchant documentation, or standard taxonomies that businesses may align with.
     *
     * @return string[]|null
     */
    public function getCategories(): array|null;

    /**
     * Filter by product categories (OR logic — matches products in any listed categories). Values match against the value field in product category entries. Valid values can be discovered from the categories field in search results, merchant documentation, or standard taxonomies that businesses may align with.
     *
     * @param string[]|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceFilterInterface|null
     */
    public function getPrice(): PriceFilterInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceFilterInterface|null $price
     * @return self
     */
    public function setPrice(PriceFilterInterface|null $price): self;
}
