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
 * Schema: Line Item Response
 */
interface LineItemResponseInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return ItemResponseInterface
     */
    public function getItem(): ItemResponseInterface;

    /**
     * Quantity of the item being purchased.
     *
     * @return int
     */
    public function getQuantity(): int;

    /**
     * Line item totals breakdown.
     *
     * @return TotalResponseInterface[]
     */
    public function getTotals(): array;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @return string|null
     */
    public function getParentId(): string|null;

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * @param ItemResponseInterface $item
     * @return self
     */
    public function setItem(ItemResponseInterface $item): self;

    /**
     * Quantity of the item being purchased.
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;

    /**
     * Line item totals breakdown.
     *
     * @param TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(array $totals): self;

    /**
     * Parent line item identifier for any nested structures.
     *
     * @param string|null $parent_id
     * @return self
     */
    public function setParentId(string|null $parent_id): self;
}
