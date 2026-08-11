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

use Magebit\UcpSpec\Api\Shopping\Ap2MandateResponseAp2WithCheckoutMandateInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * AP2 extension data including checkout mandate.
 */
class Ap2MandateResponseAp2WithCheckoutMandate extends SpecObject implements Ap2MandateResponseAp2WithCheckoutMandateInterface
{
    /**
     * @return string|null
     */
    public function getCheckoutMandate(): string|null
    {
        return $this->get(self::KEY_CHECKOUT_MANDATE);
    }

    /**
     * @param string|null $checkoutMandate
     * @return self
     */
    public function setCheckoutMandate(string|null $checkoutMandate): self
    {
        return $this->set(self::KEY_CHECKOUT_MANDATE, $checkoutMandate);
    }
}
