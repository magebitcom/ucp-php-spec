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
 * Full UCP metadata for /.well-known/ucp discovery.
 *
 * Schema: UCP Discovery Profile
 */
interface DiscoveryProfile
{
    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return Services
     */
    public function getServices(): Services;

    /**
     * Supported capabilities and extensions.
     *
     * @return Discovery[]
     */
    public function getCapabilities(): array;
}
