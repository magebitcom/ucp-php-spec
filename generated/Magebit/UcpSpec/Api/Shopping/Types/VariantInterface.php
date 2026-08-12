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
 * A purchasable variant of a product with specific option selections.
 *
 * Schema: Variant
 */
interface VariantInterface
{
    public const KEY_ID = 'id';
    public const KEY_SKU = 'sku';
    public const KEY_BARCODES = 'barcodes';
    public const KEY_HANDLE = 'handle';
    public const KEY_TITLE = 'title';
    public const KEY_DESCRIPTION = 'description';
    public const KEY_URL = 'url';
    public const KEY_CATEGORIES = 'categories';
    public const KEY_PRICE = 'price';
    public const KEY_LIST_PRICE = 'list_price';
    public const KEY_UNIT_PRICE = 'unit_price';
    public const KEY_AVAILABILITY = 'availability';
    public const KEY_OPTIONS = 'options';
    public const KEY_MEDIA = 'media';
    public const KEY_RATING = 'rating';
    public const KEY_TAGS = 'tags';
    public const KEY_METADATA = 'metadata';
    public const KEY_SELLER = 'seller';

    /**
     * Global ID (GID) uniquely identifying this variant. Used as item.id in checkout.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Global ID (GID) uniquely identifying this variant. Used as item.id in checkout.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Business-assigned identifier for inventory and fulfillment.
     *
     * @return string|null
     */
    public function getSku(): string|null;

    /**
     * Business-assigned identifier for inventory and fulfillment.
     *
     * @param string|null $sku
     * @return self
     */
    public function setSku(string|null $sku): self;

    /**
     * Industry-standard product identifiers for cross-reference and correlation.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantBarcodesItemInterface[]|null
     */
    public function getBarcodes(): array|null;

    /**
     * Industry-standard product identifiers for cross-reference and correlation.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantBarcodesItemInterface[]|null $barcodes
     * @return self
     */
    public function setBarcodes(array|null $barcodes): self;

    /**
     * URL-safe variant handle/slug.
     *
     * @return string|null
     */
    public function getHandle(): string|null;

    /**
     * URL-safe variant handle/slug.
     *
     * @param string|null $handle
     * @return self
     */
    public function setHandle(string|null $handle): self;

    /**
     * Variant display title (e.g., 'Blue / Large').
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Variant display title (e.g., 'Blue / Large').
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self;

    /**
     * Variant description in one or more formats.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface
     */
    public function getDescription(): DescriptionInterface;

    /**
     * Variant description in one or more formats.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface $description
     * @return self
     */
    public function setDescription(DescriptionInterface $description): self;

    /**
     * Canonical variant page URL.
     *
     * @return string|null
     */
    public function getUrl(): string|null;

    /**
     * Canonical variant page URL.
     *
     * @param string|null $url
     * @return self
     */
    public function setUrl(string|null $url): self;

    /**
     * Variant categories with optional taxonomy identifiers.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface[]|null
     */
    public function getCategories(): array|null;

    /**
     * Variant categories with optional taxonomy identifiers.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface[]|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self;

    /**
     * Current selling price.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface
     */
    public function getPrice(): PriceInterface;

    /**
     * Current selling price.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface $price
     * @return self
     */
    public function setPrice(PriceInterface $price): self;

    /**
     * List price before discounts (for strikethrough display).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface|null
     */
    public function getListPrice(): PriceInterface|null;

    /**
     * List price before discounts (for strikethrough display).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface|null $listPrice
     * @return self
     */
    public function setListPrice(PriceInterface|null $listPrice): self;

    /**
     * Price per standard unit of measurement. MAY be omitted when unit pricing does not apply.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceInterface|null
     */
    public function getUnitPrice(): VariantUnitPriceInterface|null;

    /**
     * Price per standard unit of measurement. MAY be omitted when unit pricing does not apply.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceInterface|null $unitPrice
     * @return self
     */
    public function setUnitPrice(VariantUnitPriceInterface|null $unitPrice): self;

    /**
     * Variant availability for purchase.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantAvailabilityInterface|null
     */
    public function getAvailability(): VariantAvailabilityInterface|null;

    /**
     * Variant availability for purchase.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantAvailabilityInterface|null $availability
     * @return self
     */
    public function setAvailability(VariantAvailabilityInterface|null $availability): self;

    /**
     * Option values that define this variant (e.g., Color: Blue, Size: Large).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null
     */
    public function getOptions(): array|null;

    /**
     * Option values that define this variant (e.g., Color: Blue, Size: Large).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null $options
     * @return self
     */
    public function setOptions(array|null $options): self;

    /**
     * Variant media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MediaInterface[]|null
     */
    public function getMedia(): array|null;

    /**
     * Variant media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MediaInterface[]|null $media
     * @return self
     */
    public function setMedia(array|null $media): self;

    /**
     * Variant rating.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\RatingInterface|null
     */
    public function getRating(): RatingInterface|null;

    /**
     * Variant rating.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\RatingInterface|null $rating
     * @return self
     */
    public function setRating(RatingInterface|null $rating): self;

    /**
     * Variant tags for categorization and search.
     *
     * @return string[]|null
     */
    public function getTags(): array|null;

    /**
     * Variant tags for categorization and search.
     *
     * @param string[]|null $tags
     * @return self
     */
    public function setTags(array|null $tags): self;

    /**
     * Business-defined custom data extending the standard variant model.
     *
     * @return array<mixed>|null
     */
    public function getMetadata(): array|null;

    /**
     * Business-defined custom data extending the standard variant model.
     *
     * @param array<mixed>|null $metadata
     * @return self
     */
    public function setMetadata(array|null $metadata): self;

    /**
     * Optional seller context for this variant.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantSellerInterface|null
     */
    public function getSeller(): VariantSellerInterface|null;

    /**
     * Optional seller context for this variant.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantSellerInterface|null $seller
     * @return self
     */
    public function setSeller(VariantSellerInterface|null $seller): self;
}
