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

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\SelectedPaymentInstrumentInterface;

/**
 * Payment configuration containing handlers.
 *
 * Schema: Payment
 */
interface PaymentInterface
{
    public const KEY_INSTRUMENTS = 'instruments';

    /**
     * The payment instruments available for this payment. Each instrument is associated with a specific handler via the handler_id field. Handlers can extend the base payment_instrument schema to add handler-specific fields.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\SelectedPaymentInstrumentInterface[]|null
     */
    public function getInstruments(): array|null;

    /**
     * The payment instruments available for this payment. Each instrument is associated with a specific handler via the handler_id field. Handlers can extend the base payment_instrument schema to add handler-specific fields.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\SelectedPaymentInstrumentInterface[]|null $instruments
     * @return self
     */
    public function setInstruments(?array $instruments): self;
}
