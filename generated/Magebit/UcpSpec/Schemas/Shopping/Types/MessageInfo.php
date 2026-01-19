<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Schema: Message Info
 */
interface MessageInfo
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
}
