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

use Magebit\UcpSpec\Api\Shopping\DiscountCompleteRequestCheckoutInterface;
use Magebit\UcpSpec\Api\Shopping\PaymentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Checkout extended with discount capability.
 */
class DiscountCompleteRequestCheckout extends SpecObject implements DiscountCompleteRequestCheckoutInterface
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
}
