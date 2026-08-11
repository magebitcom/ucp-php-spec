<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

/**
 * Display information for this card payment instrument.
 */
interface CardPaymentInstrumentDisplayInterface
{
    public const KEY_BRAND = 'brand';
    public const KEY_LAST_DIGITS = 'last_digits';
    public const KEY_EXPIRY_MONTH = 'expiry_month';
    public const KEY_EXPIRY_YEAR = 'expiry_year';
    public const KEY_DESCRIPTION = 'description';
    public const KEY_CARD_ART = 'card_art';

    /**
     * The card brand/network (e.g., visa, mastercard, amex).
     *
     * @return string|null
     */
    public function getBrand(): string|null;

    /**
     * Last 4 digits of the card number.
     *
     * @return string|null
     */
    public function getLastDigits(): string|null;

    /**
     * The month of the card's expiration date (1-12).
     *
     * @return int|null
     */
    public function getExpiryMonth(): int|null;

    /**
     * The year of the card's expiration date.
     *
     * @return int|null
     */
    public function getExpiryYear(): int|null;

    /**
     * An optional rich text description of the card to display to the user (e.g., 'Visa ending in 1234, expires 12/2025').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * An optional URI to a rich image representing the card (e.g., card art provided by the issuer).
     *
     * @return string|null
     */
    public function getCardArt(): string|null;
}
