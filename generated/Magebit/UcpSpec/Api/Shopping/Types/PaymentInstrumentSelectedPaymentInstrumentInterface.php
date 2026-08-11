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
 * A payment instrument with selection state.
 *
 * Schema: Selected Payment Instrument
 */
interface PaymentInstrumentSelectedPaymentInstrumentInterface
{
    public const KEY_ID = 'id';
    public const KEY_HANDLER_ID = 'handler_id';
    public const KEY_TYPE = 'type';
    public const KEY_BILLING_ADDRESS = 'billing_address';
    public const KEY_CREDENTIAL = 'credential';
    public const KEY_DISPLAY = 'display';
    public const KEY_SELECTED = 'selected';

    /**
     * A unique identifier for this instrument instance, assigned by the platform.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * A unique identifier for this instrument instance, assigned by the platform.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * The unique identifier for the handler instance that produced this instrument. This corresponds to the 'id' field in the Payment Handler definition.
     *
     * @return string
     */
    public function getHandlerId(): string;

    /**
     * The unique identifier for the handler instance that produced this instrument. This corresponds to the 'id' field in the Payment Handler definition.
     *
     * @param string $handlerId
     * @return self
     */
    public function setHandlerId(string $handlerId): self;

    /**
     * The broad category of the instrument (e.g., 'card', 'tokenized_card'). Specific schemas will constrain this to a constant value.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * The broad category of the instrument (e.g., 'card', 'tokenized_card'). Specific schemas will constrain this to a constant value.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * The billing address associated with this payment method.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface|null
     */
    public function getBillingAddress(): PostalAddressInterface|null;

    /**
     * The billing address associated with this payment method.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface|null $billingAddress
     * @return self
     */
    public function setBillingAddress(PostalAddressInterface|null $billingAddress): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaymentCredentialInterface|null
     */
    public function getCredential(): PaymentCredentialInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaymentCredentialInterface|null $credential
     * @return self
     */
    public function setCredential(PaymentCredentialInterface|null $credential): self;

    /**
     * Display information for this payment instrument. Each payment instrument schema defines its specific display properties, as outlined by the payment handler.
     *
     * @return array<mixed>|null
     */
    public function getDisplay(): array|null;

    /**
     * Display information for this payment instrument. Each payment instrument schema defines its specific display properties, as outlined by the payment handler.
     *
     * @param array<mixed>|null $display
     * @return self
     */
    public function setDisplay(array|null $display): self;

    /**
     * Whether this instrument is selected by the user.
     *
     * @return bool|null
     */
    public function getSelected(): bool|null;

    /**
     * Whether this instrument is selected by the user.
     *
     * @param bool|null $selected
     * @return self
     */
    public function setSelected(bool|null $selected): self;
}
