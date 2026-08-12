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

use Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface;
use Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MediaInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PriceInterface;
use Magebit\UcpSpec\Api\Shopping\Types\RatingInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantAvailabilityInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantBarcodesItemInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantSellerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A purchasable variant of a product with specific option selections.
 */
class Variant extends SpecObject implements VariantInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['metadata'];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->requireString(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return string|null
     */
    public function getSku(): string|null
    {
        return $this->stringOrNull(self::KEY_SKU);
    }

    /**
     * @param string|null $sku
     * @return self
     */
    public function setSku(string|null $sku): self
    {
        return $this->set(self::KEY_SKU, $sku);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantBarcodesItemInterface[]|null
     */
    public function getBarcodes(): array|null
    {
        return $this->instanceListOrNull(self::KEY_BARCODES, \Magebit\UcpSpec\Api\Shopping\Types\VariantBarcodesItemInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantBarcodesItemInterface[]|null $barcodes
     * @return self
     */
    public function setBarcodes(array|null $barcodes): self
    {
        return $this->set(self::KEY_BARCODES, $barcodes);
    }

    /**
     * @return string|null
     */
    public function getHandle(): string|null
    {
        return $this->stringOrNull(self::KEY_HANDLE);
    }

    /**
     * @param string|null $handle
     * @return self
     */
    public function setHandle(string|null $handle): self
    {
        return $this->set(self::KEY_HANDLE, $handle);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->requireString(self::KEY_TITLE);
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        return $this->set(self::KEY_TITLE, $title);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface
     */
    public function getDescription(): DescriptionInterface
    {
        return $this->requireInstance(self::KEY_DESCRIPTION, \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface $description
     * @return self
     */
    public function setDescription(DescriptionInterface $description): self
    {
        return $this->set(self::KEY_DESCRIPTION, $description);
    }

    /**
     * @return string|null
     */
    public function getUrl(): string|null
    {
        return $this->stringOrNull(self::KEY_URL);
    }

    /**
     * @param string|null $url
     * @return self
     */
    public function setUrl(string|null $url): self
    {
        return $this->set(self::KEY_URL, $url);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface[]|null
     */
    public function getCategories(): array|null
    {
        return $this->instanceListOrNull(self::KEY_CATEGORIES, \Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\CategoryInterface[]|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self
    {
        return $this->set(self::KEY_CATEGORIES, $categories);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface
     */
    public function getPrice(): PriceInterface
    {
        return $this->requireInstance(self::KEY_PRICE, \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface $price
     * @return self
     */
    public function setPrice(PriceInterface $price): self
    {
        return $this->set(self::KEY_PRICE, $price);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface|null
     */
    public function getListPrice(): PriceInterface|null
    {
        return $this->instanceOrNull(self::KEY_LIST_PRICE, \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceInterface|null $listPrice
     * @return self
     */
    public function setListPrice(PriceInterface|null $listPrice): self
    {
        return $this->set(self::KEY_LIST_PRICE, $listPrice);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceInterface|null
     */
    public function getUnitPrice(): VariantUnitPriceInterface|null
    {
        return $this->instanceOrNull(self::KEY_UNIT_PRICE, \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceInterface|null $unitPrice
     * @return self
     */
    public function setUnitPrice(VariantUnitPriceInterface|null $unitPrice): self
    {
        return $this->set(self::KEY_UNIT_PRICE, $unitPrice);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantAvailabilityInterface|null
     */
    public function getAvailability(): VariantAvailabilityInterface|null
    {
        return $this->instanceOrNull(self::KEY_AVAILABILITY, \Magebit\UcpSpec\Api\Shopping\Types\VariantAvailabilityInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantAvailabilityInterface|null $availability
     * @return self
     */
    public function setAvailability(VariantAvailabilityInterface|null $availability): self
    {
        return $this->set(self::KEY_AVAILABILITY, $availability);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null
     */
    public function getOptions(): array|null
    {
        return $this->instanceListOrNull(self::KEY_OPTIONS, \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null $options
     * @return self
     */
    public function setOptions(array|null $options): self
    {
        return $this->set(self::KEY_OPTIONS, $options);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MediaInterface[]|null
     */
    public function getMedia(): array|null
    {
        return $this->instanceListOrNull(self::KEY_MEDIA, \Magebit\UcpSpec\Api\Shopping\Types\MediaInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MediaInterface[]|null $media
     * @return self
     */
    public function setMedia(array|null $media): self
    {
        return $this->set(self::KEY_MEDIA, $media);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\RatingInterface|null
     */
    public function getRating(): RatingInterface|null
    {
        return $this->instanceOrNull(self::KEY_RATING, \Magebit\UcpSpec\Api\Shopping\Types\RatingInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\RatingInterface|null $rating
     * @return self
     */
    public function setRating(RatingInterface|null $rating): self
    {
        return $this->set(self::KEY_RATING, $rating);
    }

    /**
     * @return string[]|null
     */
    public function getTags(): array|null
    {
        return $this->arrayOrNull(self::KEY_TAGS);
    }

    /**
     * @param string[]|null $tags
     * @return self
     */
    public function setTags(array|null $tags): self
    {
        return $this->set(self::KEY_TAGS, $tags);
    }

    /**
     * @return array<mixed>|null
     */
    public function getMetadata(): array|null
    {
        return $this->arrayOrNull(self::KEY_METADATA);
    }

    /**
     * @param array<mixed>|null $metadata
     * @return self
     */
    public function setMetadata(array|null $metadata): self
    {
        return $this->set(self::KEY_METADATA, $metadata);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantSellerInterface|null
     */
    public function getSeller(): VariantSellerInterface|null
    {
        return $this->instanceOrNull(self::KEY_SELLER, \Magebit\UcpSpec\Api\Shopping\Types\VariantSellerInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantSellerInterface|null $seller
     * @return self
     */
    public function setSeller(VariantSellerInterface|null $seller): self
    {
        return $this->set(self::KEY_SELLER, $seller);
    }
}
