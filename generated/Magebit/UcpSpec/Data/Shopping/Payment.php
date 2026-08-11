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

use Magebit\UcpSpec\Api\Shopping\PaymentInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PaymentInstrumentSelectedPaymentInstrumentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Payment configuration containing handlers.
 */
class Payment extends SpecObject implements PaymentInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaymentInstrumentSelectedPaymentInstrumentInterface[]|null
     */
    public function getInstruments(): array|null
    {
        return $this->get(self::KEY_INSTRUMENTS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaymentInstrumentSelectedPaymentInstrumentInterface[]|null $instruments
     * @return self
     */
    public function setInstruments(array|null $instruments): self
    {
        return $this->set(self::KEY_INSTRUMENTS, $instruments);
    }
}
