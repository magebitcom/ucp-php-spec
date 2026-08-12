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
use Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ProductInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ProductOptionInterface;
use Magebit\UcpSpec\Api\Shopping\Types\RatingInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A product in the catalog with variants and options.
 */
class Product extends SpecObject implements ProductInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface
     */
    public function getPriceRange(): PriceRangeInterface
    {
        return $this->requireInstance(self::KEY_PRICE_RANGE, \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface $priceRange
     * @return self
     */
    public function setPriceRange(PriceRangeInterface $priceRange): self
    {
        return $this->set(self::KEY_PRICE_RANGE, $priceRange);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface|null
     */
    public function getListPriceRange(): PriceRangeInterface|null
    {
        return $this->instanceOrNull(self::KEY_LIST_PRICE_RANGE, \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PriceRangeInterface|null $listPriceRange
     * @return self
     */
    public function setListPriceRange(PriceRangeInterface|null $listPriceRange): self
    {
        return $this->set(self::KEY_LIST_PRICE_RANGE, $listPriceRange);
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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ProductOptionInterface[]|null
     */
    public function getOptions(): array|null
    {
        return $this->instanceListOrNull(self::KEY_OPTIONS, \Magebit\UcpSpec\Api\Shopping\Types\ProductOptionInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ProductOptionInterface[]|null $options
     * @return self
     */
    public function setOptions(array|null $options): self
    {
        return $this->set(self::KEY_OPTIONS, $options);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantInterface[]
     */
    public function getVariants(): array
    {
        return $this->instanceList(self::KEY_VARIANTS, \Magebit\UcpSpec\Api\Shopping\Types\VariantInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantInterface[] $variants
     * @return self
     */
    public function setVariants(array $variants): self
    {
        return $this->set(self::KEY_VARIANTS, $variants);
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
}
