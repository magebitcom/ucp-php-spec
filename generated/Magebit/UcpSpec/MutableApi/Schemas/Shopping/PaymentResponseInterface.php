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

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentHandlerResponseInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentInstrumentInterface;

/**
 * Payment configuration containing handlers.
 *
 * Schema: Payment Response
 */
interface PaymentResponseInterface
{
    public const KEY_HANDLERS = 'handlers';
    public const KEY_SELECTED_INSTRUMENT_ID = 'selected_instrument_id';
    public const KEY_INSTRUMENTS = 'instruments';

    /**
     * Processing configurations that define how payment instruments can be collected. Each handler specifies a tokenization or payment collection strategy.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentHandlerResponseInterface[]
     */
    public function getHandlers(): array;

    /**
     * The id of the currently selected payment instrument from the instruments array. Set by the agent when submitting payment, and echoed back by the merchant in finalized state.
     *
     * @return string|null
     */
    public function getSelectedInstrumentId(): string|null;

    /**
     * The payment instruments available for this payment. Each instrument is associated with a specific handler via the handler_id field. Handlers can extend the base payment_instrument schema to add handler-specific fields.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentInstrumentInterface[]|null
     */
    public function getInstruments(): array|null;

    /**
     * Processing configurations that define how payment instruments can be collected. Each handler specifies a tokenization or payment collection strategy.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentHandlerResponseInterface[] $handlers
     * @return self
     */
    public function setHandlers(array $handlers): self;

    /**
     * The id of the currently selected payment instrument from the instruments array. Set by the agent when submitting payment, and echoed back by the merchant in finalized state.
     *
     * @param string|null $selectedInstrumentId
     * @return self
     */
    public function setSelectedInstrumentId(?string $selectedInstrumentId): self;

    /**
     * The payment instruments available for this payment. Each instrument is associated with a specific handler via the handler_id field. Handlers can extend the base payment_instrument schema to add handler-specific fields.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentInstrumentInterface[]|null $instruments
     * @return self
     */
    public function setInstruments(?array $instruments): self;
}
