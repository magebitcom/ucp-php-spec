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
 * Matches a specific instrument type based on validation logic.
 *
 * Schema: Payment Instrument
 */
interface PaymentInstrumentInterface
{
    public const KEY_ID = 'id';
    public const KEY_HANDLER_ID = 'handler_id';
    public const KEY_TYPE = 'type';
    public const KEY_BILLING_ADDRESS = 'billing_address';
    public const KEY_CREDENTIAL = 'credential';
    public const KEY_BRAND = 'brand';
    public const KEY_LAST_DIGITS = 'last_digits';
    public const KEY_EXPIRY_MONTH = 'expiry_month';
    public const KEY_EXPIRY_YEAR = 'expiry_year';
    public const KEY_RICH_TEXT_DESCRIPTION = 'rich_text_description';
    public const KEY_RICH_CARD_ART = 'rich_card_art';

    /**
     * A unique identifier for this instrument instance, assigned by the Agent. Used to reference this specific instrument in the 'payment.selected_instrument_id' field.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * The unique identifier for the handler instance that produced this instrument. This corresponds to the 'id' field in the Payment Handler definition.
     *
     * @return string
     */
    public function getHandlerId(): string;

    /**
     * Indicates this is a card payment instrument.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * The billing address associated with this payment method.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\PostalAddressInterface|null
     */
    public function getBillingAddress(): PostalAddressInterface|null;

    /**
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\PaymentCredentialInterface|null
     */
    public function getCredential(): PaymentCredentialInterface|null;

    /**
     * The card brand/network (e.g., visa, mastercard, amex).
     *
     * @return string
     */
    public function getBrand(): string;

    /**
     * Last 4 digits of the card number.
     *
     * @return string
     */
    public function getLastDigits(): string;

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
    public function getRichTextDescription(): string|null;

    /**
     * An optional URI to a rich image representing the card (e.g., card art provided by the issuer).
     *
     * @return string|null
     */
    public function getRichCardArt(): string|null;
}
