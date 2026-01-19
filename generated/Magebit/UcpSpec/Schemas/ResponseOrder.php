<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas;

/**
 * UCP metadata for order responses. No payment handlers needed post-purchase.
 *
 * Schema: UCP Order Response
 */
interface ResponseOrder
{
    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * Active capabilities for this response.
     *
     * @return Response[]
     */
    public function getCapabilities(): array;
}
