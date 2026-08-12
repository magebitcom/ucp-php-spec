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

use Magebit\UcpSpec\Api\Shopping\Ap2MandateCompleteRequestCheckoutInterface;
use Magebit\UcpSpec\Api\Shopping\PaymentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Checkout extended with AP2 mandate support.
 */
class Ap2MandateCompleteRequestCheckout extends SpecObject implements Ap2MandateCompleteRequestCheckoutInterface
{
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
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface
     */
    public function getPayment(): PaymentInterface
    {
        return $this->requireInstance(self::KEY_PAYMENT, \Magebit\UcpSpec\Api\Shopping\PaymentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\PaymentInterface $payment
     * @return self
     */
    public function setPayment(PaymentInterface $payment): self
    {
        return $this->set(self::KEY_PAYMENT, $payment);
    }

    /**
     * @return array<mixed>
     */
    public function getAp2(): array
    {
        return $this->getArray(self::KEY_AP2);
    }

    /**
     * @param array<mixed> $ap2
     * @return self
     */
    public function setAp2(array $ap2): self
    {
        return $this->set(self::KEY_AP2, $ap2);
    }
}
