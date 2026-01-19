<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * A card credential containing sensitive payment card details including raw Primary Account Numbers (PANs). This credential type MUST NOT be used for checkout, only with payment handlers that tokenize or encrypt credentials. CRITICAL: Both parties handling CardCredential (sender and receiver) MUST be PCI DSS compliant. Transmission MUST use HTTPS/TLS with strong cipher suites.
 *
 * Schema: Card Credential
 */
interface CardCredential
{
    public const CARD_NUMBER_TYPE_FPAN = 'fpan';
    public const CARD_NUMBER_TYPE_NETWORK_TOKEN = 'network_token';
    public const CARD_NUMBER_TYPE_DPAN = 'dpan';

    /**
     * The credential type identifier for card credentials.
     *
     * @return mixed
     */
    public function getType();

    /**
     * The type of card number. Network tokens are preferred with fallback to FPAN. See PCI Scope for more details.
     *
     * @return string
     */
    public function getCardNumberType(): string;

    /**
     * Card number.
     *
     * @return string|null
     */
    public function getNumber(): string|null;

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
     * Cardholder name.
     *
     * @return string|null
     */
    public function getName(): string|null;

    /**
     * Card CVC number.
     *
     * @return string|null
     */
    public function getCvc(): string|null;

    /**
     * Cryptogram provided with network tokens.
     *
     * @return string|null
     */
    public function getCryptogram(): string|null;

    /**
     * Electronic Commerce Indicator / Security Level Indicator provided with network tokens.
     *
     * @return string|null
     */
    public function getEciValue(): string|null;
}
