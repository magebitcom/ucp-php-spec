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
 * Payment configuration containing handlers.
 *
 * Schema: Payment Update Request
 */
interface PaymentUpdateRequestInterface
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
     * @return PaymentInstrumentInterface[]|null
     */
    public function getInstruments(): array|null;
}
