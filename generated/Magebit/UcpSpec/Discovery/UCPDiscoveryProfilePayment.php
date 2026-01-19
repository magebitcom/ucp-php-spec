<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Discovery;

use Magebit\UcpSpec\Schemas\Shopping\Types\PaymentHandlerResponse;

/**
 * Payment configuration containing handlers
 */
interface UCPDiscoveryProfilePayment
{
    /**
     * Payment handler definitions that describe how instruments can be collected
     *
     * @return PaymentHandlerResponse[]|null
     */
    public function getHandlers(): array|null;
}
