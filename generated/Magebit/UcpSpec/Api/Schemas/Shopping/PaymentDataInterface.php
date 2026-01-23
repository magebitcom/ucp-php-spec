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

use Magebit\UcpSpec\Api\Schemas\Shopping\Types\PaymentInstrumentInterface;

/**
 * The data that will used to submit payment to the merchant.
 *
 * Schema: Payment Data
 */
interface PaymentDataInterface
{
    public const KEY_PAYMENT_DATA = 'payment_data';

    /**
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Types\PaymentInstrumentInterface
     */
    public function getPaymentData(): PaymentInstrumentInterface;
}
