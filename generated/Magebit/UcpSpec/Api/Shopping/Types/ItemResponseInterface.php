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
 * Schema: Item Response
 */
interface ItemResponseInterface
{
    public const KEY_ID = 'id';
    public const KEY_TITLE = 'title';
    public const KEY_PRICE = 'price';
    public const KEY_IMAGE_URL = 'image_url';

    /**
     * The product identifier, often the SKU, required to resolve the product details associated with this line item. Should be recognized by both the Platform, and the Business.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * The product identifier, often the SKU, required to resolve the product details associated with this line item. Should be recognized by both the Platform, and the Business.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

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
     * Unit price in ISO 4217 minor units.
     *
     * @return int
     */
    public function getPrice(): int;

    /**
     * Unit price in ISO 4217 minor units.
     *
     * @param int $price
     * @return self
     */
    public function setPrice(int $price): self;

    /**
     * Product image URI.
     *
     * @return string|null
     */
    public function getImageUrl(): string|null;

    /**
     * Product image URI.
     *
     * @param string|null $imageUrl
     * @return self
     */
    public function setImageUrl(string|null $imageUrl): self;
}
