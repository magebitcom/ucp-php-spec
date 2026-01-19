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
 * The base definition for any payment instrument. It links the instrument to a specific Merchant configuration (handler_id) and defines common fields like billing address.
 *
 * Schema: Payment Instrument Base
 */
interface PaymentInstrumentBase
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
     * @return PostalAddress|null
     */
    public function getBillingAddress(): PostalAddress|null;

    /**
     * @return PaymentCredential|null
     */
    public function getCredential(): PaymentCredential|null;
}
