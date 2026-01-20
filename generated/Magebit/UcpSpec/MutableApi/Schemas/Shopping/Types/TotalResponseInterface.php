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
 * Schema: Total Response
 */
interface TotalResponseInterface
{
    public const TYPE_ITEMS_DISCOUNT = 'items_discount';
    public const TYPE_SUBTOTAL = 'subtotal';
    public const TYPE_DISCOUNT = 'discount';
    public const TYPE_FULFILLMENT = 'fulfillment';
    public const TYPE_TAX = 'tax';
    public const TYPE_FEE = 'fee';
    public const TYPE_TOTAL = 'total';

    /**
     * Type of total categorization.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Text to display against the amount. Should reflect appropriate method (e.g., 'Shipping', 'Delivery').
     *
     * @return string|null
     */
    public function getDisplayText(): string|null;

    /**
     * If type == total, sums subtotal - discount + fulfillment + tax + fee. Should be >= 0. Amount in minor (cents) currency units.
     *
     * @return int
     */
    public function getAmount(): int;

    /**
     * Type of total categorization.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Text to display against the amount. Should reflect appropriate method (e.g., 'Shipping', 'Delivery').
     *
     * @param string|null $display_text
     * @return self
     */
    public function setDisplayText(string|null $display_text): self;

    /**
     * If type == total, sums subtotal - discount + fulfillment + tax + fee. Should be >= 0. Amount in minor (cents) currency units.
     *
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self;
}
