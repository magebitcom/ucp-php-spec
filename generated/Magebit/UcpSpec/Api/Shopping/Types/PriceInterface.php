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
 * Price with explicit currency.
 *
 * Schema: Price
 */
interface PriceInterface
{
    public const KEY_AMOUNT = 'amount';
    public const KEY_CURRENCY = 'currency';

    /**
     * Amount in ISO 4217 minor units. Use 0 for free items.
     *
     * @return int
     */
    public function getAmount(): int;

    /**
     * Amount in ISO 4217 minor units. Use 0 for free items.
     *
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self;

    /**
     * ISO 4217 currency code (e.g., 'USD', 'EUR', 'GBP').
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * ISO 4217 currency code (e.g., 'USD', 'EUR', 'GBP').
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self;
}
