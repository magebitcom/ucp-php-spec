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
 * The ap2 object included in checkout responses when AP2 is negotiated.
 *
 * Schema: AP2 Checkout Response Object
 */
interface Ap2MandateAp2CheckoutResponseInterface
{
    /**
     * Merchant's signature proving checkout terms are authentic.
     *
     * @return string
     */
    public function getMerchantAuthorization(): string;

    /**
     * Merchant's signature proving checkout terms are authentic.
     *
     * @param string $merchant_authorization
     * @return self
     */
    public function setMerchantAuthorization(string $merchant_authorization): self;
}
