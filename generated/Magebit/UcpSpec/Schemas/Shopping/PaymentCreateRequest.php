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
 * Payment configuration containing handlers.
 *
 * Schema: Payment Create Request
 */
interface PaymentCreateRequest
{
    /**
     * The id of the currently selected payment instrument from the instruments array. Set by the agent when submitting payment, and echoed back by the merchant in finalized state.
     *
     * @return string|null
     */
    public function getSelectedInstrumentId(): string|null;

    /**
     * The payment instruments available for this payment. Each instrument is associated with a specific handler via the handler_id field. Handlers can extend the base payment_instrument schema to add handler-specific fields.
     *
     * @return PaymentInstrument[]|null
     */
    public function getInstruments(): array|null;
}
