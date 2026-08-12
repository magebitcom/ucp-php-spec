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
 * A product category with optional taxonomy identifier.
 *
 * Schema: Category
 */
interface CategoryInterface
{
    public const KEY_VALUE = 'value';
    public const KEY_TAXONOMY = 'taxonomy';

    /**
     * Category value or path (e.g., 'Apparel > Shirts', '1604').
     *
     * @return string
     */
    public function getValue(): string;

    /**
     * Category value or path (e.g., 'Apparel > Shirts', '1604').
     *
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self;

    /**
     * Source taxonomy. Well-known values: `google_product_category`, `shopify`, `merchant`.
     *
     * @return string|null
     */
    public function getTaxonomy(): string|null;

    /**
     * Source taxonomy. Well-known values: `google_product_category`, `shopify`, `merchant`.
     *
     * @param string|null $taxonomy
     * @return self
     */
    public function setTaxonomy(string|null $taxonomy): self;
}
