<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Discovery;

use Magebit\UcpSpec\Api\Schemas\Shopping\Types\PaymentHandlerResponseInterface;

/**
 * Payment configuration containing handlers
 */
interface UCPDiscoveryProfilePaymentInterface
{
    public const KEY_HANDLERS = 'handlers';

    /**
     * Payment handler definitions that describe how instruments can be collected
     *
     * @return PaymentHandlerResponseInterface[]|null
     */
    public function getHandlers(): array|null;
}
