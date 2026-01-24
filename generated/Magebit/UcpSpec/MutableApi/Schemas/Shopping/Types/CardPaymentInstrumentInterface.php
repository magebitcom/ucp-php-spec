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
 * A basic card payment instrument with visible card details. Can be inherited by a handler's instrument schema to define handler-specific display details or more complex credential structures.
 *
 * Schema: Card Payment Instrument
 */
interface CardPaymentInstrumentInterface
{
    public const KEY_ID = 'id';
    public const KEY_HANDLER_ID = 'handler_id';
    public const KEY_TYPE = 'type';
    public const KEY_BILLING_ADDRESS = 'billing_address';
    public const KEY_CREDENTIAL = 'credential';
    public const KEY_DISPLAY = 'display';

    /**
     * A unique identifier for this instrument instance, assigned by the platform.
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
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PostalAddressInterface|null
     */
    public function getBillingAddress(): PostalAddressInterface|null;

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentCredentialInterface|null
     */
    public function getCredential(): PaymentCredentialInterface|null;

    /**
     * Display information for this card payment instrument.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\CardPaymentInstrumentDisplayInterface|null
     */
    public function getDisplay(): CardPaymentInstrumentDisplayInterface|null;

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
     * @param string $handlerId
     * @return self
     */
    public function setHandlerId(string $handlerId): self;

    /**
     * Indicates this is a card payment instrument.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * The billing address associated with this payment method.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PostalAddressInterface|null $billingAddress
     * @return self
     */
    public function setBillingAddress(?PostalAddressInterface $billingAddress): self;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentCredentialInterface|null $credential
     * @return self
     */
    public function setCredential(?PaymentCredentialInterface $credential): self;

    /**
     * Display information for this card payment instrument.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\CardPaymentInstrumentDisplayInterface|null $display
     * @return self
     */
    public function setDisplay(?CardPaymentInstrumentDisplayInterface $display): self;
}
