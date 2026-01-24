<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

/**
 * Base checkout schema. Extensions compose onto this using allOf.
 *
 * Schema: Checkout Complete Request
 */
interface CheckoutCompleteRequestInterface
{
    public const KEY_PAYMENT = 'payment';

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentInterface
     */
    public function getPayment(): PaymentInterface;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentInterface $payment
     * @return self
     */
    public function setPayment(PaymentInterface $payment): self;
}
