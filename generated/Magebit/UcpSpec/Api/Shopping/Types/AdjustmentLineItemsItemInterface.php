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

interface AdjustmentLineItemsItemInterface
{
    public const KEY_ID = 'id';
    public const KEY_QUANTITY = 'quantity';

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
     * Quantity affected by this adjustment.
     *
     * @return int
     */
    public function getQuantity(): int;

    /**
     * Quantity affected by this adjustment.
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;
}
