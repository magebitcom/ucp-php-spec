<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Non-sensitive backend identifiers for linking.
 *
 * Schema: Payment Account Info
 */
interface PaymentAccountInfo
{
    /**
     * EMVCo PAR. A unique identifier linking a payment card to a specific account, enabling tracking across tokens (Apple Pay, physical card, etc).
     *
     * @return string|null
     */
    function getPaymentAccountReference(): string|null;
}
