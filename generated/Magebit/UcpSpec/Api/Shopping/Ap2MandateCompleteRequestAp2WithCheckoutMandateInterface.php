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
 * AP2 extension data including checkout mandate.
 */
interface Ap2MandateCompleteRequestAp2WithCheckoutMandateInterface
{
    public const KEY_CHECKOUT_MANDATE = 'checkout_mandate';

    public const CONSTRAINTS = [
        'checkout_mandate' => ['pattern' => '^[A-Za-z0-9_-]+\.[A-Za-z0-9_-]*\.[A-Za-z0-9_-]+(~[A-Za-z0-9_-]+)*$'],
    ];

    /**
     * SD-JWT+kb proving user authorized this checkout.
     *
     * @return string
     */
    public function getCheckoutMandate(): string;

    /**
     * SD-JWT+kb proving user authorized this checkout.
     *
     * @param string $checkoutMandate
     * @return self
     */
    public function setCheckoutMandate(string $checkoutMandate): self;
}
