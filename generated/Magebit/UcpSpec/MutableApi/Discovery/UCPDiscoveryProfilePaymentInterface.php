<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Discovery;

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PaymentHandlerResponseInterface;

/**
 * Payment configuration containing handlers
 */
interface UCPDiscoveryProfilePaymentInterface
{
    /**
     * Payment handler definitions that describe how instruments can be collected
     *
     * @return PaymentHandlerResponseInterface[]|null
     */
    public function getHandlers(): array|null;

    /**
     * Payment handler definitions that describe how instruments can be collected
     *
     * @param PaymentHandlerResponseInterface[]|null $handlers
     * @return self
     */
    public function setHandlers(array|null $handlers): self;
}
