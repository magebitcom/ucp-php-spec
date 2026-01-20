<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

/**
 * Schema: Item Response
 */
interface ItemResponseInterface
{
    /**
     * Should be recognized by both the Platform, and the Business. For Google it should match the id provided in the "id" field in the product feed.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Product title.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Unit price in minor (cents) currency units.
     *
     * @return int
     */
    public function getPrice(): int;

    /**
     * Product image URI.
     *
     * @return string|null
     */
    public function getImageUrl(): string|null;

    /**
     * Should be recognized by both the Platform, and the Business. For Google it should match the id provided in the "id" field in the product feed.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Product title.
     *
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self;

    /**
     * Unit price in minor (cents) currency units.
     *
     * @param int $price
     * @return self
     */
    public function setPrice(int $price): self;

    /**
     * Product image URI.
     *
     * @param string|null $imageUrl
     * @return self
     */
    public function setImageUrl(?string $imageUrl): self;
}
