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

interface ExpectationLineItemsItemInterface
{
    public const KEY_ID = 'id';
    public const KEY_QUANTITY = 'quantity';
    public const CONSTRAINTS = ['quantity' => ['minimum' => 1]];

    /**
     * Line item ID reference.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Line item ID reference.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Quantity of this item in this expectation.
     *
     * @return int
     */
    public function getQuantity(): int;

    /**
     * Quantity of this item in this expectation.
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;
}
