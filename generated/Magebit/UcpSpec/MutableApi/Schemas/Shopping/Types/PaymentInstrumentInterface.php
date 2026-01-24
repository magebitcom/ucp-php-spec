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
 * The base definition for any payment instrument. It links the instrument to a specific payment handler.
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
     * The broad category of the instrument (e.g., 'card', 'tokenized_card'). Specific schemas will constrain this to a constant value.
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
     * Display information for this payment instrument. Each payment instrument schema defines its specific display properties, as outlined by the payment handler.
     *
     * @return array<mixed>|null
     */
    public function getDisplay(): array|null;

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
     * The broad category of the instrument (e.g., 'card', 'tokenized_card'). Specific schemas will constrain this to a constant value.
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
     * Display information for this payment instrument. Each payment instrument schema defines its specific display properties, as outlined by the payment handler.
     *
     * @param array<mixed>|null $display
     * @return self
     */
    public function setDisplay(?array $display): self;
}
