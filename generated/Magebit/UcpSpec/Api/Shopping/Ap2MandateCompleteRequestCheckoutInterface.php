<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

/**
 * Checkout extended with AP2 mandate support.
 *
 * Schema: Checkout with AP2 Mandate Complete Request
 */
interface Ap2MandateCompleteRequestCheckoutInterface
{
    public const KEY_PAYMENT = 'payment';
    public const KEY_AP2 = 'ap2';

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface
     */
    public function getPayment(): PaymentInterface;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\PaymentInterface $payment
     * @return self
     */
    public function setPayment(PaymentInterface $payment): self;

    /**
     * @return array<mixed>|null
     */
    public function getAp2(): array|null;

    /**
     * @param array<mixed>|null $ap2
     * @return self
     */
    public function setAp2(array|null $ap2): self;
}
