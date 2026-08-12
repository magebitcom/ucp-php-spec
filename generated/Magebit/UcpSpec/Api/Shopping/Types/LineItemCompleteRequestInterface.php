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
 * Schema: Line Item Complete Request
 */
interface LineItemCompleteRequestInterface
{
    public const KEY_ID = 'id';
    public const KEY_ITEM = 'item';
    public const KEY_QUANTITY = 'quantity';
    public const KEY_PARENT_ID = 'parent_id';

    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ItemCompleteRequestInterface
     */
    public function getItem(): ItemCompleteRequestInterface;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ItemCompleteRequestInterface $item
     * @return self
     */
    public function setItem(ItemCompleteRequestInterface $item): self;

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
