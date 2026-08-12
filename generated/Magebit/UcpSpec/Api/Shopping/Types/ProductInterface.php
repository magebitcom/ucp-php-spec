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
 * A product in the catalog with variants and options.
 *
 * Schema: Product
 */
interface ProductInterface
{
    public const KEY_ID = 'id';
    public const KEY_HANDLE = 'handle';
    public const KEY_TITLE = 'title';
    public const KEY_DESCRIPTION = 'description';
    public const KEY_URL = 'url';
    public const KEY_CATEGORIES = 'categories';
    public const KEY_PRICE_RANGE = 'price_range';
    public const KEY_LIST_PRICE_RANGE = 'list_price_range';
    public const KEY_MEDIA = 'media';
    public const KEY_OPTIONS = 'options';
    public const KEY_VARIANTS = 'variants';
    public const KEY_RATING = 'rating';
    public const KEY_TAGS = 'tags';
    public const KEY_METADATA = 'metadata';

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface
     */
    public function getDescription(): DescriptionInterface;

    /**
     * Product description in one or more formats.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface $description
     * @return self
     */
    public function setDescription(DescriptionInterface $description): self;

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface[]|null
     */
    public function getCategories(): array|null;

    /**
     * Product categories with optional taxonomy identifiers.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface[]|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self;

    /**
     * Price range across all variants.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface
     */
    public function getPriceRange(): PriceRangeInterface;

    /**
     * Price range across all variants.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface $priceRange
     * @return self
     */
    public function setPriceRange(PriceRangeInterface $priceRange): self;

    /**
     * List price range before discounts (for strikethrough display).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface|null
     */
    public function getListPriceRange(): PriceRangeInterface|null;

    /**
     * List price range before discounts (for strikethrough display).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface|null $listPriceRange
     * @return self
     */
    public function setListPriceRange(PriceRangeInterface|null $listPriceRange): self;

    /**
     * Product media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MediaInterface[]|null
     */
    public function getMedia(): array|null;

    /**
     * Product media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MediaInterface[]|null $media
     * @return self
     */
    public function setMedia(array|null $media): self;

    /**
     * Product options (Size, Color, etc.).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ProductOptionInterface[]|null
     */
    public function getOptions(): array|null;

    /**
     * Product options (Size, Color, etc.).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ProductOptionInterface[]|null $options
     * @return self
     */
    public function setOptions(array|null $options): self;

    /**
     * Purchasable variants of this product. First item is the featured variant for listings.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantInterface[]
     */
    public function getVariants(): array;

    /**
     * Purchasable variants of this product. First item is the featured variant for listings.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantInterface[] $variants
     * @return self
     */
    public function setVariants(array $variants): self;

    /**
     * Aggregate product rating.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\RatingInterface|null
     */
    public function getRating(): RatingInterface|null;

    /**
     * Aggregate product rating.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\RatingInterface|null $rating
     * @return self
     */
    public function setRating(RatingInterface|null $rating): self;

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
