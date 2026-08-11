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

use Magebit\UcpSpec\Api\Shopping\FulfillmentCompleteRequestCheckoutInterface;
use Magebit\UcpSpec\Api\Shopping\PaymentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Checkout extended with hierarchical fulfillment.
 */
class FulfillmentCompleteRequestCheckout extends SpecObject implements FulfillmentCompleteRequestCheckoutInterface
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
