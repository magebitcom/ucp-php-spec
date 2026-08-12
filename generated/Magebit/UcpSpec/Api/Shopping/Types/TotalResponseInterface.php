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
 * A cost breakdown entry with a category, amount, and optional display text.
 *
 * Schema: Total Response
 */
interface TotalResponseInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_DISPLAY_TEXT = 'display_text';
    public const KEY_AMOUNT = 'amount';

    /**
     * Cost category. Well-known values: subtotal, items_discount, discount, fulfillment, tax, fee, total. Businesses MAY use additional values.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Cost category. Well-known values: subtotal, items_discount, discount, fulfillment, tax, fee, total. Businesses MAY use additional values.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Text to display against the amount. Should reflect appropriate method (e.g., 'Shipping', 'Delivery').
     *
     * @return string|null
     */
    public function getDisplayText(): string|null;

    /**
     * Text to display against the amount. Should reflect appropriate method (e.g., 'Shipping', 'Delivery').
     *
     * @param string|null $displayText
     * @return self
     */
    public function setDisplayText(string|null $displayText): self;

    /**
     * @return int
     */
    public function getAmount(): int;

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self;
}
