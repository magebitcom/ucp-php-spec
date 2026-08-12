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
 * Schema: Item Update Request
 */
interface ItemUpdateRequestInterface
{
    public const KEY_ID = 'id';

    /**
     * The product identifier, often the SKU, required to resolve the product details associated with this line item. Should be recognized by both the Platform, and the Business.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * The product identifier, often the SKU, required to resolve the product details associated with this line item. Should be recognized by both the Platform, and the Business.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;
}
