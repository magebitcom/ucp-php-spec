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
 * Schema: Line Item Update Request
 */
interface LineItemUpdateRequestInterface
{
    public const KEY_ID = 'id';
    public const KEY_ITEM = 'item';
    public const KEY_QUANTITY = 'quantity';
    public const KEY_PARENT_ID = 'parent_id';
    public const CONSTRAINTS = ['quantity' => ['minimum' => 1]];

    /**
     * @return string|null
     */
    public function getId(): string|null;

    /**
     * @param string|null $id
     * @return self
     */
    public function setId(string|null $id): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ItemUpdateRequestInterface
     */
    public function getItem(): ItemUpdateRequestInterface;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ItemUpdateRequestInterface $item
     * @return self
     */
    public function setItem(ItemUpdateRequestInterface $item): self;

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

    /**
     * Parent line item identifier for any nested structures.
     *
     * @return string|null
     */
    public function getParentId(): string|null;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @param string|null $parentId
     * @return self
     */
    public function setParentId(string|null $parentId): self;
}
