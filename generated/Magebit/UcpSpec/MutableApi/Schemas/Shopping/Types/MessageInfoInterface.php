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
 * Schema: Message Info
 */
interface MessageInfoInterface
{
    public const CONTENT_TYPE_PLAIN = 'plain';
    public const CONTENT_TYPE_MARKDOWN = 'markdown';

    /**
     * Message type discriminator.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * RFC 9535 JSONPath to the component the message refers to.
     *
     * @return string|null
     */
    public function getPath(): string|null;

    /**
     * Info code for programmatic handling.
     *
     * @return string|null
     */
    public function getCode(): string|null;

    /**
     * Content format, default = plain.
     *
     * @return string|null
     */
    public function getContentType(): string|null;

    /**
     * Human-readable message.
     *
     * @return string
     */
    public function getContent(): string;

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
     * @param string|null $path
     * @return self
     */
    public function setPath(?string $path): self;

    /**
     * Info code for programmatic handling.
     *
     * @param string|null $code
     * @return self
     */
    public function setCode(?string $code): self;

    /**
     * Content format, default = plain.
     *
     * @param string|null $contentType
     * @return self
     */
    public function setContentType(?string $contentType): self;

    /**
     * Human-readable message.
     *
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self;
}
