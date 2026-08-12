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
 * Product media item (image, video, etc.).
 *
 * Schema: Media
 */
interface MediaInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_URL = 'url';
    public const KEY_ALT_TEXT = 'alt_text';
    public const KEY_WIDTH = 'width';
    public const KEY_HEIGHT = 'height';

    /**
     * Media type. Well-known values: `image`, `video`, `model_3d`.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Media type. Well-known values: `image`, `video`, `model_3d`.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * URL to the media resource.
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * URL to the media resource.
     *
     * @param string $url
     * @return self
     */
    public function setUrl(string $url): self;

    /**
     * Accessibility text describing the media.
     *
     * @return string|null
     */
    public function getAltText(): string|null;

    /**
     * Accessibility text describing the media.
     *
     * @param string|null $altText
     * @return self
     */
    public function setAltText(string|null $altText): self;

    /**
     * Width in pixels (for images/video).
     *
     * @return int|null
     */
    public function getWidth(): int|null;

    /**
     * Width in pixels (for images/video).
     *
     * @param int|null $width
     * @return self
     */
    public function setWidth(int|null $width): self;

    /**
     * Height in pixels (for images/video).
     *
     * @return int|null
     */
    public function getHeight(): int|null;

    /**
     * Height in pixels (for images/video).
     *
     * @param int|null $height
     * @return self
     */
    public function setHeight(int|null $height): self;
}
