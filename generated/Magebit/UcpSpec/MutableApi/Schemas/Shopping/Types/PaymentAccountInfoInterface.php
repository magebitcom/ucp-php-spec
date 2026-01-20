<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

/**
 * Non-sensitive backend identifiers for linking.
 *
 * Schema: Payment Account Info
 */
interface PaymentAccountInfoInterface
{
    /**
     * EMVCo PAR. A unique identifier linking a payment card to a specific account, enabling tracking across tokens (Apple Pay, physical card, etc).
     *
     * @return string|null
     */
    public function getPaymentAccountReference(): string|null;

    /**
     * EMVCo PAR. A unique identifier linking a payment card to a specific account, enabling tracking across tokens (Apple Pay, physical card, etc).
     *
     * @param string|null $payment_account_reference
     * @return self
     */
    public function setPaymentAccountReference(string|null $payment_account_reference): self;
}
