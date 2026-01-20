<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas;

/**
 * UCP metadata for checkout responses.
 *
 * Schema: UCP Checkout Response
 */
interface UcpResponseCheckoutInterface
{
    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * Active capabilities for this response.
     *
     * @return CapabilityResponseInterface[]
     */
    public function getCapabilities(): array;
}
