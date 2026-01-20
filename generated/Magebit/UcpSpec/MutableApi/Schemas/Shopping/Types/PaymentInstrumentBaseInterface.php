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
 * The base definition for any payment instrument. It links the instrument to a specific Merchant configuration (handler_id) and defines common fields like billing address.
 *
 * Schema: Payment Instrument Base
 */
interface PaymentInstrumentBaseInterface
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
     * The broad category of the instrument (e.g., 'card', 'tokenized_card'). Specific schemas will constrain this to a constant value.
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
     * A unique identifier for this instrument instance, assigned by the Agent. Used to reference this specific instrument in the 'payment.selected_instrument_id' field.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * The unique identifier for the handler instance that produced this instrument. This corresponds to the 'id' field in the Payment Handler definition.
     *
     * @param string $handler_id
     * @return self
     */
    public function setHandlerId(string $handler_id): self;

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
     * @param PostalAddressInterface|null $billing_address
     * @return self
     */
    public function setBillingAddress(PostalAddressInterface|null $billing_address): self;

    /**
     * @param PaymentCredentialInterface|null $credential
     * @return self
     */
    public function setCredential(PaymentCredentialInterface|null $credential): self;
}
