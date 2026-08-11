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
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Checkout extended with AP2 mandate support.
 */
class Ap2MandateCompleteRequestCheckout extends SpecObject implements Ap2MandateCompleteRequestCheckoutInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface
     */
    public function getPayment(): PaymentInterface
    {
        return $this->get(self::KEY_PAYMENT);
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
     * @return array<mixed>|null
     */
    public function getAp2(): array|null
    {
        return $this->get(self::KEY_AP2);
    }

    /**
     * @param array<mixed>|null $ap2
     * @return self
     */
    public function setAp2(array|null $ap2): self
    {
        return $this->set(self::KEY_AP2, $ap2);
    }
}
