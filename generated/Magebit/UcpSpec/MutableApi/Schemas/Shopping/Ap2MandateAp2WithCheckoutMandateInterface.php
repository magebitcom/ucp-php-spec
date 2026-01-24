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
 * AP2 extension data including checkout mandate.
 */
interface Ap2MandateAp2WithCheckoutMandateInterface
{
    public const KEY_CHECKOUT_MANDATE = 'checkout_mandate';

    /**
     * SD-JWT+kb proving user authorized this checkout.
     *
     * @return string|null
     */
    public function getCheckoutMandate(): string|null;

    /**
     * SD-JWT+kb proving user authorized this checkout.
     *
     * @param string|null $checkoutMandate
     * @return self
     */
    public function setCheckoutMandate(?string $checkoutMandate): self;
}
