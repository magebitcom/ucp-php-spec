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
 * Description content in one or more formats. At least one format must be provided.
 *
 * Schema: Description
 */
interface DescriptionInterface
{
    public const KEY_PLAIN = 'plain';
    public const KEY_HTML = 'html';
    public const KEY_MARKDOWN = 'markdown';

    /**
     * Plain text content.
     *
     * @return string|null
     */
    public function getPlain(): string|null;

    /**
     * Plain text content.
     *
     * @param string|null $plain
     * @return self
     */
    public function setPlain(string|null $plain): self;

    /**
     * HTML-formatted content. Security: Platforms MUST sanitize before rendering—strip scripts, event handlers, and untrusted elements. Treat all rich text as untrusted input.
     *
     * @return string|null
     */
    public function getHtml(): string|null;

    /**
     * HTML-formatted content. Security: Platforms MUST sanitize before rendering—strip scripts, event handlers, and untrusted elements. Treat all rich text as untrusted input.
     *
     * @param string|null $html
     * @return self
     */
    public function setHtml(string|null $html): self;

    /**
     * Markdown-formatted content.
     *
     * @return string|null
     */
    public function getMarkdown(): string|null;

    /**
     * Markdown-formatted content.
     *
     * @param string|null $markdown
     * @return self
     */
    public function setMarkdown(string|null $markdown): self;
}
