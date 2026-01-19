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

use Magebit\UcpSpec\Schemas\Shopping\Types\PaymentInstrument;

/**
 * The data that will used to submit payment to the merchant.
 *
 * Schema: Payment Data
 */
interface PaymentData
{
    /**
     * @return PaymentInstrument
     */
    function getPaymentData(): PaymentInstrument;
}
