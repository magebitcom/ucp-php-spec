<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\Ap2MandateCreateRequestCheckoutInterface;
use Magebit\UcpSpec\Api\Shopping\PaymentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Checkout extended with AP2 mandate support.
 */
class Ap2MandateCreateRequestCheckout extends SpecObject implements Ap2MandateCreateRequestCheckoutInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[]
     */
    public function getLineItems(): array
    {
        return $this->instanceList(self::KEY_LINE_ITEMS, \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        return $this->set(self::KEY_LINE_ITEMS, $lineItems);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null
    {
        return $this->instanceOrNull(self::KEY_BUYER, \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self
    {
        return $this->set(self::KEY_BUYER, $buyer);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null
    {
        return $this->instanceOrNull(self::KEY_CONTEXT, \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(ContextInterface|null $context): self
    {
        return $this->set(self::KEY_CONTEXT, $context);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null
     */
    public function getSignals(): SignalsInterface|null
    {
        return $this->instanceOrNull(self::KEY_SIGNALS, \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null $signals
     * @return self
     */
    public function setSignals(SignalsInterface|null $signals): self
    {
        return $this->set(self::KEY_SIGNALS, $signals);
    }

    /**
     * @return array<string, string>|null
     */
    public function getAttribution(): array|null
    {
        return $this->arrayOrNull(self::KEY_ATTRIBUTION);
    }

    /**
     * @param array<string, string>|null $attribution
     * @return self
     */
    public function setAttribution(array|null $attribution): self
    {
        return $this->set(self::KEY_ATTRIBUTION, $attribution);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null
     */
    public function getPayment(): PaymentInterface|null
    {
        return $this->instanceOrNull(self::KEY_PAYMENT, \Magebit\UcpSpec\Api\Shopping\PaymentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null $payment
     * @return self
     */
    public function setPayment(PaymentInterface|null $payment): self
    {
        return $this->set(self::KEY_PAYMENT, $payment);
    }
}
