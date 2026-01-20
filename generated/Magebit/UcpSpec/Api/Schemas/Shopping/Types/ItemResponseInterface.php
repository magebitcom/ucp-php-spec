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
 * Schema: Item Response
 */
interface ItemResponseInterface
{
    /**
     * Should be recognized by both the Platform, and the Business. For Google it should match the id provided in the "id" field in the product feed.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Product title.
     *
     * @return string
     */
    public function getTitle(): string;

    /**
     * Unit price in minor (cents) currency units.
     *
     * @return int
     */
    public function getPrice(): int;

    /**
     * Product image URI.
     *
     * @return string|null
     */
    public function getImageUrl(): string|null;
}
