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
 * Line item object. Expected to use the currency of the parent object.
 *
 * Schema: Line Item Create Request
 */
interface LineItemCreateRequestInterface
{
    public const KEY_ITEM = 'item';
    public const KEY_QUANTITY = 'quantity';
    public const CONSTRAINTS = ['quantity' => ['minimum' => 1]];

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ItemCreateRequestInterface
     */
    public function getItem(): ItemCreateRequestInterface;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ItemCreateRequestInterface $item
     * @return self
     */
    public function setItem(ItemCreateRequestInterface $item): self;

    /**
     * Quantity of the item being purchased.
     *
     * @return int
     */
    public function getQuantity(): int;

    /**
     * Quantity of the item being purchased.
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;
}
