<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithMerchantAuthorizationInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * AP2 extension data including merchant authorization.
 */
class Ap2MandateResponseAp2WithMerchantAuthorization extends SpecObject implements Ap2MandateResponseAp2WithMerchantAuthorizationInterface
{
    /**
     * @return string|null
     */
    public function getMerchantAuthorization(): string|null
    {
        return $this->stringOrNull(self::KEY_MERCHANT_AUTHORIZATION);
    }

    /**
     * @param string|null $merchantAuthorization
     * @return self
     */
    public function setMerchantAuthorization(string|null $merchantAuthorization): self
    {
        return $this->set(self::KEY_MERCHANT_AUTHORIZATION, $merchantAuthorization);
    }
}
