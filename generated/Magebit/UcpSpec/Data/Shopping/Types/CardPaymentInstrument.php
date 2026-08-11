<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentDisplayInterface;
use Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PaymentCredentialInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A basic card payment instrument with visible card details. Can be inherited by a handler's instrument schema to define handler-specific display details or more complex credential structures.
 */
class CardPaymentInstrument extends SpecObject implements CardPaymentInstrumentInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->requireString(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return string
     */
    public function getHandlerId(): string
    {
        return $this->requireString(self::KEY_HANDLER_ID);
    }

    /**
     * @param string $handlerId
     * @return self
     */
    public function setHandlerId(string $handlerId): self
    {
        return $this->set(self::KEY_HANDLER_ID, $handlerId);
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->requireString(self::KEY_TYPE);
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        return $this->set(self::KEY_TYPE, $type);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface|null
     */
    public function getBillingAddress(): PostalAddressInterface|null
    {
        return $this->instanceOrNull(self::KEY_BILLING_ADDRESS, \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface|null $billingAddress
     * @return self
     */
    public function setBillingAddress(PostalAddressInterface|null $billingAddress): self
    {
        return $this->set(self::KEY_BILLING_ADDRESS, $billingAddress);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaymentCredentialInterface|null
     */
    public function getCredential(): PaymentCredentialInterface|null
    {
        return $this->instanceOrNull(self::KEY_CREDENTIAL, \Magebit\UcpSpec\Api\Shopping\Types\PaymentCredentialInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaymentCredentialInterface|null $credential
     * @return self
     */
    public function setCredential(PaymentCredentialInterface|null $credential): self
    {
        return $this->set(self::KEY_CREDENTIAL, $credential);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentDisplayInterface|null
     */
    public function getDisplay(): CardPaymentInstrumentDisplayInterface|null
    {
        return $this->instanceOrNull(self::KEY_DISPLAY, \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentDisplayInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentDisplayInterface|null $display
     * @return self
     */
    public function setDisplay(CardPaymentInstrumentDisplayInterface|null $display): self
    {
        return $this->set(self::KEY_DISPLAY, $display);
    }
}
