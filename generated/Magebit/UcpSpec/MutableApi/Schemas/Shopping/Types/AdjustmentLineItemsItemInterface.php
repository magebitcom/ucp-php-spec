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

interface AdjustmentLineItemsItemInterface
{
    /**
     * Line item ID reference.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Quantity affected by this adjustment.
     *
     * @return int
     */
    public function getQuantity(): int;

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
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self;
}
