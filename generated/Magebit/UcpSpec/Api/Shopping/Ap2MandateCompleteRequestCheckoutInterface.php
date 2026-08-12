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

use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;

/**
 * Checkout extended with AP2 mandate support.
 *
 * Schema: Checkout with AP2 Mandate Complete Request
 */
interface Ap2MandateCompleteRequestCheckoutInterface
{
    public const KEY_SIGNALS = 'signals';
    public const KEY_ATTRIBUTION = 'attribution';
    public const KEY_PAYMENT = 'payment';
    public const KEY_AP2 = 'ap2';

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null
     */
    public function getSignals(): SignalsInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null $signals
     * @return self
     */
    public function setSignals(SignalsInterface|null $signals): self;

    /**
     * @return array<string, string>|null
     */
    public function getAttribution(): array|null;

    /**
     * @param array<string, string>|null $attribution
     * @return self
     */
    public function setAttribution(array|null $attribution): self;

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
     * @return array<mixed>
     */
    public function getAp2(): array;

    /**
     * @param array<mixed> $ap2
     * @return self
     */
    public function setAp2(array $ap2): self;
}
