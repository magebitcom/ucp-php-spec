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

interface Link
{
    /**
     * Type of link. Well-known values: `privacy_policy`, `terms_of_service`, `refund_policy`, `shipping_policy`, `faq`. Consumers SHOULD handle unknown values gracefully by displaying them using the `title` field or omitting the link.
     *
     * @return string
     */
    function getType(): string;

    /**
     * The actual URL pointing to the content to be displayed.
     *
     * @return string
     */
    function getUrl(): string;

    /**
     * Optional display text for the link. When provided, use this instead of generating from type.
     *
     * @return string|null
     */
    function getTitle(): string|null;
}
