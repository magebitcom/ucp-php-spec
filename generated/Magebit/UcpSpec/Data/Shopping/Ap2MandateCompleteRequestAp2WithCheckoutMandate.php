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

use Magebit\UcpSpec\Api\Shopping\Ap2MandateCompleteRequestAp2WithCheckoutMandateInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * AP2 extension data including checkout mandate.
 */
class Ap2MandateCompleteRequestAp2WithCheckoutMandate extends SpecObject implements Ap2MandateCompleteRequestAp2WithCheckoutMandateInterface
{
    /**
     * @return string
     */
    public function getCheckoutMandate(): string
    {
        return $this->requireString(self::KEY_CHECKOUT_MANDATE);
    }

    /**
     * @param string $checkoutMandate
     * @return self
     */
    public function setCheckoutMandate(string $checkoutMandate): self
    {
        return $this->set(self::KEY_CHECKOUT_MANDATE, $checkoutMandate);
    }
}
