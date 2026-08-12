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
 * Schema: Message Info
 */
interface MessageInfoInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_PATH = 'path';
    public const KEY_CODE = 'code';
    public const KEY_CONTENT_TYPE = 'content_type';
    public const KEY_CONTENT = 'content';
    public const TYPE_INFO = 'info';
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
     * RFC 9535 JSONPath to the component the message refers to.
     *
     * @return string|null
     */
    public function getPath(): string|null;

    /**
     * RFC 9535 JSONPath to the component the message refers to.
     *
     * @param string|null $path
     * @return self
     */
    public function setPath(string|null $path): self;

    /**
     * Info code for programmatic handling.
     *
     * @return string|null
     */
    public function getCode(): string|null;

    /**
     * Info code for programmatic handling.
     *
     * @param string|null $code
     * @return self
     */
    public function setCode(string|null $code): self;

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
     * Human-readable message.
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * Human-readable message.
     *
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self;
}
