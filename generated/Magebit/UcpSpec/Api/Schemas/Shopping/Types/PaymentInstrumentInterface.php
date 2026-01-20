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
     * @return PostalAddressInterface|null
     */
    public function getBillingAddress(): PostalAddressInterface|null;

    /**
     * @return PaymentCredentialInterface|null
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
