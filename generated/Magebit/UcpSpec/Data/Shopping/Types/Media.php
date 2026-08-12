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

use Magebit\UcpSpec\Api\Shopping\Types\MediaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Product media item (image, video, etc.).
 */
class Media extends SpecObject implements MediaInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->requireString(self::KEY_TYPE);
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        return $this->set(self::KEY_TYPE, $type);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->requireString(self::KEY_URL);
    }

    /**
     * @param string $url
     * @return self
     */
    public function setUrl(string $url): self
    {
        return $this->set(self::KEY_URL, $url);
    }

    /**
     * @return string|null
     */
    public function getAltText(): string|null
    {
        return $this->stringOrNull(self::KEY_ALT_TEXT);
    }

    /**
     * @param string|null $altText
     * @return self
     */
    public function setAltText(string|null $altText): self
    {
        return $this->set(self::KEY_ALT_TEXT, $altText);
    }

    /**
     * @return int|null
     */
    public function getWidth(): int|null
    {
        return $this->intOrNull(self::KEY_WIDTH);
    }

    /**
     * @param int|null $width
     * @return self
     */
    public function setWidth(int|null $width): self
    {
        return $this->set(self::KEY_WIDTH, $width);
    }

    /**
     * @return int|null
     */
    public function getHeight(): int|null
    {
        return $this->intOrNull(self::KEY_HEIGHT);
    }

    /**
     * @param int|null $height
     * @return self
     */
    public function setHeight(int|null $height): self
    {
        return $this->set(self::KEY_HEIGHT, $height);
    }
}
