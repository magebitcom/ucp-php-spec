<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping;

/**
 * AP2 extension data including merchant authorization.
 */
interface Ap2MandateAp2WithMerchantAuthorizationInterface
{
    public const KEY_MERCHANT_AUTHORIZATION = 'merchant_authorization';

    /**
     * Merchant's signature proving checkout terms are authentic.
     *
     * @return string|null
     */
    public function getMerchantAuthorization(): string|null;
}
