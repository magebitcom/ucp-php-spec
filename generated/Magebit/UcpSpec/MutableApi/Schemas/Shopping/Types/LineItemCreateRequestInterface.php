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
 * Line item object. Expected to use the currency of the parent object.
 *
 * Schema: Line Item Create Request
 */
interface LineItemCreateRequestInterface
{
    /**
     * @return ItemCreateRequestInterface
     */
    public function getItem(): ItemCreateRequestInterface;

    /**
     * Quantity of the item being purchased.
     *
     * @return int
     */
    public function getQuantity(): int;

    /**
     * @param ItemCreateRequestInterface $item
     * @return self
     */
    public function setItem(ItemCreateRequestInterface $item): self;

    /**
     * Quantity of the item being purchased.
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;
}
