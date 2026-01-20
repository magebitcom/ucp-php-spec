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
 * Schema: Link
 */
interface LinkInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_URL = 'url';
    public const KEY_TITLE = 'title';

    /**
     * Type of link. Well-known values: `privacy_policy`, `terms_of_service`, `refund_policy`, `shipping_policy`, `faq`. Consumers SHOULD handle unknown values gracefully by displaying them using the `title` field or omitting the link.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * The actual URL pointing to the content to be displayed.
     *
     * @return string
     */
    public function getUrl(): string;

    /**
     * Optional display text for the link. When provided, use this instead of generating from type.
     *
     * @return string|null
     */
    public function getTitle(): string|null;

    /**
     * Type of link. Well-known values: `privacy_policy`, `terms_of_service`, `refund_policy`, `shipping_policy`, `faq`. Consumers SHOULD handle unknown values gracefully by displaying them using the `title` field or omitting the link.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * The actual URL pointing to the content to be displayed.
     *
     * @param string $url
     * @return self
     */
    public function setUrl(string $url): self;

    /**
     * Optional display text for the link. When provided, use this instead of generating from type.
     *
     * @param string|null $title
     * @return self
     */
    public function setTitle(?string $title): self;
}
