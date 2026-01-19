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
 * The ap2 object included in complete_checkout requests when AP2 is negotiated.
 *
 * Schema: AP2 Complete Request Object
 */
interface Ap2CompleteRequest
{
    /**
     * SD-JWT+kb proving user authorized this checkout.
     *
     * @return CheckoutMandate
     */
    function getCheckoutMandate(): CheckoutMandate;
}
