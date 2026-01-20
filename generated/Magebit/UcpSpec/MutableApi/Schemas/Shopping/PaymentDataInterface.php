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

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentInstrumentInterface;

/**
 * The data that will used to submit payment to the merchant.
 *
 * Schema: Payment Data
 */
interface PaymentDataInterface
{
    /**
     * @return PaymentInstrumentInterface
     */
    public function getPaymentData(): PaymentInstrumentInterface;

    /**
     * @param PaymentInstrumentInterface $payment_data
     * @return self
     */
    public function setPaymentData(PaymentInstrumentInterface $payment_data): self;
}
