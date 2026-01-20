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
 * The ap2 object included in complete_checkout requests when AP2 is negotiated.
 *
 * Schema: AP2 Complete Request Object
 */
interface Ap2MandateAp2CompleteRequestInterface
{
    /**
     * SD-JWT+kb proving user authorized this checkout.
     *
     * @return string
     */
    public function getCheckoutMandate(): string;

    /**
     * SD-JWT+kb proving user authorized this checkout.
     *
     * @param string $checkout_mandate
     * @return self
     */
    public function setCheckoutMandate(string $checkout_mandate): self;
}
