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

use Magebit\UcpSpec\Api\Shopping\Types\ItemResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class ItemResponse extends SpecObject implements ItemResponseInterface
{
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
     * @return int
     */
    public function getPrice(): int
    {
        return $this->requireInt(self::KEY_PRICE);
    }

    /**
     * @param int $price
     * @return self
     */
    public function setPrice(int $price): self
    {
        return $this->set(self::KEY_PRICE, $price);
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): string|null
    {
        return $this->stringOrNull(self::KEY_IMAGE_URL);
    }

    /**
     * @param string|null $imageUrl
     * @return self
     */
    public function setImageUrl(string|null $imageUrl): self
    {
        return $this->set(self::KEY_IMAGE_URL, $imageUrl);
    }
}
