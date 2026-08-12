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

use Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A product in a get_product response, extended with effective selections and availability signals on option values.
 */
class CatalogLookupDetailProduct extends SpecObject implements CatalogLookupDetailProductInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['metadata'];

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null
     */
    public function getSelected(): array|null
    {
        return $this->instanceListOrNull(self::KEY_SELECTED, \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null $selected
     * @return self
     */
    public function setSelected(array|null $selected): self
    {
        return $this->set(self::KEY_SELECTED, $selected);
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
    public function getPriceRange()
    {
        return $this->get(self::KEY_PRICE_RANGE);
    }

    /**
     * @param mixed $priceRange
     * @return self
     */
    public function setPriceRange($priceRange): self
    {
        return $this->set(self::KEY_PRICE_RANGE, $priceRange);
    }

    /**
     * @return mixed
     */
    public function getListPriceRange()
    {
        return $this->get(self::KEY_LIST_PRICE_RANGE);
    }

    /**
     * @param mixed $listPriceRange
     * @return self
     */
    public function setListPriceRange($listPriceRange): self
    {
        return $this->set(self::KEY_LIST_PRICE_RANGE, $listPriceRange);
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
     * @return array<mixed>
     */
    public function getVariants(): array
    {
        return $this->getArray(self::KEY_VARIANTS);
    }

    /**
     * @param array<mixed> $variants
     * @return self
     */
    public function setVariants(array $variants): self
    {
        return $this->set(self::KEY_VARIANTS, $variants);
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
}
