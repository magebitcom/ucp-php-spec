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
     * Warning code. Machine-readable identifier for the warning type (e.g., final_sale, prop65, fulfillment_changed, age_restricted, etc.).
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * Warning code. Machine-readable identifier for the warning type (e.g., final_sale, prop65, fulfillment_changed, age_restricted, etc.).
     *
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
}
