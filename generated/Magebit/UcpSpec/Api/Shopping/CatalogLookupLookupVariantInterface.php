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

use Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface;

/**
 * Variant with required correlation metadata for lookup responses.
 */
interface CatalogLookupLookupVariantInterface
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
    public const KEY_INPUTS = 'inputs';
    public const CONSTRAINTS = ['url' => ['format' => 'uri'], 'inputs' => ['minItems' => 1]];

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
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantBarcodesItemInterface[]|null
     */
    public function getBarcodes(): array|null;

    /**
     * Industry-standard product identifiers for cross-reference and correlation.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantBarcodesItemInterface[]|null $barcodes
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
     * @return mixed
     */
    public function getDescription();

    /**
     * Variant description in one or more formats.
     *
     * @param mixed $description
     * @return self
     */
    public function setDescription($description): self;

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
     * @return array<mixed>|null
     */
    public function getCategories(): array|null;

    /**
     * Variant categories with optional taxonomy identifiers.
     *
     * @param array<mixed>|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self;

    /**
     * Current selling price.
     *
     * @return mixed
     */
    public function getPrice();

    /**
     * Current selling price.
     *
     * @param mixed $price
     * @return self
     */
    public function setPrice($price): self;

    /**
     * List price before discounts (for strikethrough display).
     *
     * @return mixed
     */
    public function getListPrice();

    /**
     * List price before discounts (for strikethrough display).
     *
     * @param mixed $listPrice
     * @return self
     */
    public function setListPrice($listPrice): self;

    /**
     * Price per standard unit of measurement. MAY be omitted when unit pricing does not apply.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceInterface|null
     */
    public function getUnitPrice(): CatalogLookupLookupVariantUnitPriceInterface|null;

    /**
     * Price per standard unit of measurement. MAY be omitted when unit pricing does not apply.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceInterface|null $unitPrice
     * @return self
     */
    public function setUnitPrice(CatalogLookupLookupVariantUnitPriceInterface|null $unitPrice): self;

    /**
     * Variant availability for purchase.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantAvailabilityInterface|null
     */
    public function getAvailability(): CatalogLookupLookupVariantAvailabilityInterface|null;

    /**
     * Variant availability for purchase.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantAvailabilityInterface|null $availability
     * @return self
     */
    public function setAvailability(CatalogLookupLookupVariantAvailabilityInterface|null $availability): self;

    /**
     * Option values that define this variant (e.g., Color: Blue, Size: Large).
     *
     * @return array<mixed>|null
     */
    public function getOptions(): array|null;

    /**
     * Option values that define this variant (e.g., Color: Blue, Size: Large).
     *
     * @param array<mixed>|null $options
     * @return self
     */
    public function setOptions(array|null $options): self;

    /**
     * Variant media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @return array<mixed>|null
     */
    public function getMedia(): array|null;

    /**
     * Variant media (images, videos, 3D models). First item is the featured media for listings.
     *
     * @param array<mixed>|null $media
     * @return self
     */
    public function setMedia(array|null $media): self;

    /**
     * Variant rating.
     *
     * @return mixed
     */
    public function getRating();

    /**
     * Variant rating.
     *
     * @param mixed $rating
     * @return self
     */
    public function setRating($rating): self;

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
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantSellerInterface|null
     */
    public function getSeller(): CatalogLookupLookupVariantSellerInterface|null;

    /**
     * Optional seller context for this variant.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantSellerInterface|null $seller
     * @return self
     */
    public function setSeller(CatalogLookupLookupVariantSellerInterface|null $seller): self;

    /**
     * Which request identifiers resolved to this variant, and how. Each entry maps a request ID to its match type.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface[]
     */
    public function getInputs(): array;

    /**
     * Which request identifiers resolved to this variant, and how. Each entry maps a request ID to its match type.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface[] $inputs
     * @return self
     */
    public function setInputs(array $inputs): self;
}
