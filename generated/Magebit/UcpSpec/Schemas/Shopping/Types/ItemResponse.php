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
 * Schema: Item Response
 */
interface ItemResponse
{
    /**
     * Should be recognized by both the Platform, and the Business. For Google it should match the id provided in the "id" field in the product feed.
     *
     * @return string
     */
    function getId(): string;

    /**
     * Product title.
     *
     * @return string
     */
    function getTitle(): string;

    /**
     * Unit price in minor (cents) currency units.
     *
     * @return int
     */
    function getPrice(): int;

    /**
     * Product image URI.
     *
     * @return string|null
     */
    function getImageUrl(): string|null;
}
