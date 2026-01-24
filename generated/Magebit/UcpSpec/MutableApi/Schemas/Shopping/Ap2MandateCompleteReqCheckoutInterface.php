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
 * Checkout extended with AP2 mandate support.
 *
 * Schema: Checkout with AP2 Mandate Complete Request
 */
interface Ap2MandateCompleteReqCheckoutInterface
{
    public const KEY_PAYMENT = 'payment';
    public const KEY_AP2 = 'ap2';

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentInterface
     */
    public function getPayment(): PaymentInterface;

    /**
     * @return array<mixed>|null
     */
    public function getAp2(): array|null;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentInterface $payment
     * @return self
     */
    public function setPayment(PaymentInterface $payment): self;

    /**
     * @param array<mixed>|null $ap2
     * @return self
     */
    public function setAp2(?array $ap2): self;
}
