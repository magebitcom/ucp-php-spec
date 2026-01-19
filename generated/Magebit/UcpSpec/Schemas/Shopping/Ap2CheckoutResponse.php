<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping;

/**
 * The ap2 object included in checkout responses when AP2 is negotiated.
 *
 * Schema: AP2 Checkout Response Object
 */
interface Ap2CheckoutResponse
{
    /**
     * Merchant's signature proving checkout terms are authentic.
     *
     * @return string
     */
    public function getMerchantAuthorization(): string;
}
