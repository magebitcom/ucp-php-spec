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
 * Schema: Message Warning
 */
interface MessageWarningInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_PATH = 'path';
    public const KEY_CODE = 'code';
    public const KEY_CONTENT = 'content';
    public const KEY_CONTENT_TYPE = 'content_type';
    public const KEY_PRESENTATION = 'presentation';
    public const KEY_IMAGE_URL = 'image_url';
    public const KEY_URL = 'url';
    public const TYPE_WARNING = 'warning';
    public const CONTENT_TYPE_PLAIN = 'plain';
    public const CONTENT_TYPE_MARKDOWN = 'markdown';

    /**
     * Message type discriminator.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Message type discriminator.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * JSONPath (RFC 9535) to related field (e.g., $.line_items[0]).
     *
     * @return string|null
     */
    public function getPath(): string|null;

    /**
     * JSONPath (RFC 9535) to related field (e.g., $.line_items[0]).
     *
     * @param string|null $path
     * @return self
     */
    public function setPath(string|null $path): self;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self;

    /**
     * Human-readable warning message that MUST be displayed.
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * Human-readable warning message that MUST be displayed.
     *
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self;

    /**
     * Content format, default = plain.
     *
     * @return string|null
     */
    public function getContentType(): string|null;

    /**
     * Content format, default = plain.
     *
     * @param string|null $contentType
     * @return self
     */
    public function setContentType(string|null $contentType): self;

    /**
     * Rendering contract for this warning. 'notice' (default): platform MUST display, MAY dismiss. 'disclosure': platform MUST display in proximity to the path-referenced component, MUST NOT hide or auto-dismiss. See specification for full contract.
     *
     * @return string|null
     */
    public function getPresentation(): string|null;

    /**
     * Rendering contract for this warning. 'notice' (default): platform MUST display, MAY dismiss. 'disclosure': platform MUST display in proximity to the path-referenced component, MUST NOT hide or auto-dismiss. See specification for full contract.
     *
     * @param string|null $presentation
     * @return self
     */
    public function setPresentation(string|null $presentation): self;

    /**
     * URL to a required visual element (e.g., warning symbol, energy class label).
     *
     * @return string|null
     */
    public function getImageUrl(): string|null;

    /**
     * URL to a required visual element (e.g., warning symbol, energy class label).
     *
     * @param string|null $imageUrl
     * @return self
     */
    public function setImageUrl(string|null $imageUrl): self;

    /**
     * Reference URL for more information (e.g., regulatory site, registry entry, policy page).
     *
     * @return string|null
     */
    public function getUrl(): string|null;

    /**
     * Reference URL for more information (e.g., regulatory site, registry entry, policy page).
     *
     * @param string|null $url
     * @return self
     */
    public function setUrl(string|null $url): self;
}
