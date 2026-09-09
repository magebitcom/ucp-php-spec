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
 * AP2 extension data including merchant authorization.
 */
interface Ap2MandateResponseAp2WithMerchantAuthorizationInterface
{
    public const KEY_MERCHANT_AUTHORIZATION = 'merchant_authorization';
    public const CONSTRAINTS = ['merchant_authorization' => ['pattern' => '^[A-Za-z0-9_-]+\.\.[A-Za-z0-9_-]+$']];

    /**
     * Merchant's signature proving checkout terms are authentic.
     *
     * @return string|null
     */
    public function getMerchantAuthorization(): string|null;

    /**
     * Merchant's signature proving checkout terms are authentic.
     *
     * @param string|null $merchantAuthorization
     * @return self
     */
    public function setMerchantAuthorization(string|null $merchantAuthorization): self;
}
