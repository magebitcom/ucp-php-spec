<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

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
    public const CONTENT_TYPE_PLAIN = 'plain';
    public const CONTENT_TYPE_MARKDOWN = 'markdown';

    /**
     * Message type discriminator.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * JSONPath (RFC 9535) to related field (e.g., $.line_items[0]).
     *
     * @return string|null
     */
    public function getPath(): string|null;

    /**
     * Warning code. Machine-readable identifier for the warning type (e.g., final_sale, prop65, fulfillment_changed, age_restricted, etc.).
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * Human-readable warning message that MUST be displayed.
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * Content format, default = plain.
     *
     * @return string|null
     */
    public function getContentType(): string|null;
}
