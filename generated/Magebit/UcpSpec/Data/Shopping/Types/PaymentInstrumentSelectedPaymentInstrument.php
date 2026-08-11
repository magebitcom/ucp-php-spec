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

use Magebit\UcpSpec\Api\Shopping\Types\PaymentCredentialInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PaymentInstrumentSelectedPaymentInstrumentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A payment instrument with selection state.
 */
class PaymentInstrumentSelectedPaymentInstrument extends SpecObject implements PaymentInstrumentSelectedPaymentInstrumentInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['display'];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->get(self::KEY_ID);
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
        return $this->get(self::KEY_HANDLER_ID);
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
        return $this->get(self::KEY_TYPE);
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
        return $this->get(self::KEY_BILLING_ADDRESS);
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
        return $this->get(self::KEY_CREDENTIAL);
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
     * @return array<mixed>|null
     */
    public function getDisplay(): array|null
    {
        return $this->get(self::KEY_DISPLAY);
    }

    /**
     * @param array<mixed>|null $display
     * @return self
     */
    public function setDisplay(array|null $display): self
    {
        return $this->set(self::KEY_DISPLAY, $display);
    }

    /**
     * @return bool|null
     */
    public function getSelected(): bool|null
    {
        return $this->get(self::KEY_SELECTED);
    }

    /**
     * @param bool|null $selected
     * @return self
     */
    public function setSelected(bool|null $selected): self
    {
        return $this->set(self::KEY_SELECTED, $selected);
    }
}
