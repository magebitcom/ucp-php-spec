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

use Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface;

/**
 * A product in a get_product response, extended with effective selections and availability signals on option values.
 */
interface CatalogLookupDetailProductInterface
{
    public const KEY_SELECTED = 'selected';
    public const KEY_OPTIONS = 'options';
    public const KEY_ID = 'id';
    public const KEY_HANDLE = 'handle';
    public const KEY_TITLE = 'title';
    public const KEY_DESCRIPTION = 'description';
    public const KEY_URL = 'url';
    public const KEY_CATEGORIES = 'categories';
    public const KEY_PRICE_RANGE = 'price_range';
    public const KEY_LIST_PRICE_RANGE = 'list_price_range';
    public const KEY_MEDIA = 'media';
    public const KEY_VARIANTS = 'variants';
    public const KEY_RATING = 'rating';
    public const KEY_TAGS = 'tags';
    public const KEY_METADATA = 'metadata';
    public const CONSTRAINTS = ['url' => ['format' => 'uri'], 'variants' => ['minItems' => 1]];

    /**
     * Effective option selections that anchor the featured variant and availability signals. Required when the product has configurable options; may be empty or omitted for products with no option axes.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null
     */
    public function getSelected(): array|null;

    /**
     * Effective option selections that anchor the featured variant and availability signals. Required when the product has configurable options; may be empty or omitted for products with no option axes.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null $selected
     * @return self
     */
    public function setSelected(array|null $selected): self;

    /**
     * Product options (Size, Color, etc.).
     *
     * @return array<mixed>|null
     */
    public function getOptions(): array|null;

    /**
     * Product options (Size, Color, etc.).
     *
     * @param array<mixed>|null $options
     * @return self
     */
    public function setOptions(array|null $options): self;

    /**
     * Global ID (GID) uniquely identifying this product.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Global ID (GID) uniquely identifying this product.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * URL-safe slug for SEO-friendly URLs (e.g., 'blue-runner-pro'). Use id for stable API references.
     *
     * @return string|null
     */
    public function getHandle(): string|null;

    /**
     * URL-safe slug for SEO-friendly URLs (e.g., 'blue-runner-pro'). Use id for stable API references.
     *
     * @param string|null $handle
     * @return self
     */
    public function setHandle(string|null $handle): self;

    /**
     * Product title.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Product title.
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self;

    /**
     * Product description in one or more formats.
     *
     * @return mixed
     */
    public function getDescription();

    /**
     * Product description in one or more formats.
     *
     * @param mixed $description
     * @return self
     */
    public function setDescription($description): self;

    /**
     * Canonical product page URL.
     *
     * @return string|null
     */
    public function getUrl(): string|null;

    /**
     * Canonical product page URL.
     *
     * @param string|null $url
     * @return self
     */
    public function setUrl(string|null $url): self;

    /**
     * Product categories with optional taxonomy identifiers.
     *
     * @return array<mixed>|null
     */
    public function getCategories(): array|null;

    /**
     * Product categories with optional taxonomy identifiers.
     *
     * @param array<mixed>|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self;

    /**
     * Price range across all variants.
     *
     * @return mixed
     */
    public function getPriceRange();

    /**
     * Price range across all variants.
     *
     * @param mixed $priceRange
     * @return self
     */
    public function setPriceRange($priceRange): self;

    /**
     * List price range before discounts (for strikethrough display).
     *
     * @return mixed
     */
    public function getListPriceRange();

    /**
     * List price range before discounts (for strikethrough display).
     *
     * @param mixed $listPriceRange
     * @return self
     */
    public function setListPriceRange($listPriceRange): self;

    /**
     * Product media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @return array<mixed>|null
     */
    public function getMedia(): array|null;

    /**
     * Product media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @param array<mixed>|null $media
     * @return self
     */
    public function setMedia(array|null $media): self;

    /**
     * Purchasable variants of this product. First item is the featured variant for listings.
     *
     * @return array<mixed>
     */
    public function getVariants(): array;

    /**
     * Purchasable variants of this product. First item is the featured variant for listings.
     *
     * @param array<mixed> $variants
     * @return self
     */
    public function setVariants(array $variants): self;

    /**
     * Aggregate product rating.
     *
     * @return mixed
     */
    public function getRating();

    /**
     * Aggregate product rating.
     *
     * @param mixed $rating
     * @return self
     */
    public function setRating($rating): self;

    /**
     * Product tags for categorization and search.
     *
     * @return string[]|null
     */
    public function getTags(): array|null;

    /**
     * Product tags for categorization and search.
     *
     * @param string[]|null $tags
     * @return self
     */
    public function setTags(array|null $tags): self;

    /**
     * Business-defined custom data extending the standard product model.
     *
     * @return array<mixed>|null
     */
    public function getMetadata(): array|null;

    /**
     * Business-defined custom data extending the standard product model.
     *
     * @param array<mixed>|null $metadata
     * @return self
     */
    public function setMetadata(array|null $metadata): self;
}
