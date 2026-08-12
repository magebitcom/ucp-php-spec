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

use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantAvailabilityInterface;
use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantBarcodesItemInterface;
use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantInterface;
use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantSellerInterface;
use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceInterface;
use Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Variant with required correlation metadata for lookup responses.
 */
class CatalogLookupLookupVariant extends SpecObject implements CatalogLookupLookupVariantInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantBarcodesItemInterface[]|null
     */
    public function getBarcodes(): array|null
    {
        return $this->instanceListOrNull(self::KEY_BARCODES, \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantBarcodesItemInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantBarcodesItemInterface[]|null $barcodes
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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->get(self::KEY_DESCRIPTION);
    }

    /**
     * @param mixed $description
     * @return self
     */
    public function setDescription($description): self
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
     * @return array<mixed>|null
     */
    public function getCategories(): array|null
    {
        return $this->arrayOrNull(self::KEY_CATEGORIES);
    }

    /**
     * @param array<mixed>|null $categories
     * @return self
     */
    public function setCategories(array|null $categories): self
    {
        return $this->set(self::KEY_CATEGORIES, $categories);
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->get(self::KEY_PRICE);
    }

    /**
     * @param mixed $price
     * @return self
     */
    public function setPrice($price): self
    {
        return $this->set(self::KEY_PRICE, $price);
    }

    /**
     * @return mixed
     */
    public function getListPrice()
    {
        return $this->get(self::KEY_LIST_PRICE);
    }

    /**
     * @param mixed $listPrice
     * @return self
     */
    public function setListPrice($listPrice): self
    {
        return $this->set(self::KEY_LIST_PRICE, $listPrice);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceInterface|null
     */
    public function getUnitPrice(): CatalogLookupLookupVariantUnitPriceInterface|null
    {
        return $this->instanceOrNull(self::KEY_UNIT_PRICE, \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceInterface|null $unitPrice
     * @return self
     */
    public function setUnitPrice(CatalogLookupLookupVariantUnitPriceInterface|null $unitPrice): self
    {
        return $this->set(self::KEY_UNIT_PRICE, $unitPrice);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantAvailabilityInterface|null
     */
    public function getAvailability(): CatalogLookupLookupVariantAvailabilityInterface|null
    {
        return $this->instanceOrNull(self::KEY_AVAILABILITY, \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantAvailabilityInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantAvailabilityInterface|null $availability
     * @return self
     */
    public function setAvailability(CatalogLookupLookupVariantAvailabilityInterface|null $availability): self
    {
        return $this->set(self::KEY_AVAILABILITY, $availability);
    }

    /**
     * @return array<mixed>|null
     */
    public function getOptions(): array|null
    {
        return $this->arrayOrNull(self::KEY_OPTIONS);
    }

    /**
     * @param array<mixed>|null $options
     * @return self
     */
    public function setOptions(array|null $options): self
    {
        return $this->set(self::KEY_OPTIONS, $options);
    }

    /**
     * @return array<mixed>|null
     */
    public function getMedia(): array|null
    {
        return $this->arrayOrNull(self::KEY_MEDIA);
    }

    /**
     * @param array<mixed>|null $media
     * @return self
     */
    public function setMedia(array|null $media): self
    {
        return $this->set(self::KEY_MEDIA, $media);
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->get(self::KEY_RATING);
    }

    /**
     * @param mixed $rating
     * @return self
     */
    public function setRating($rating): self
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
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantSellerInterface|null
     */
    public function getSeller(): CatalogLookupLookupVariantSellerInterface|null
    {
        return $this->instanceOrNull(self::KEY_SELLER, \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantSellerInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantSellerInterface|null $seller
     * @return self
     */
    public function setSeller(CatalogLookupLookupVariantSellerInterface|null $seller): self
    {
        return $this->set(self::KEY_SELLER, $seller);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface[]
     */
    public function getInputs(): array
    {
        return $this->instanceList(self::KEY_INPUTS, \Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface[] $inputs
     * @return self
     */
    public function setInputs(array $inputs): self
    {
        return $this->set(self::KEY_INPUTS, $inputs);
    }
}
