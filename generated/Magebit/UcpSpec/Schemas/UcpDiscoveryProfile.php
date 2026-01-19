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

use Magebit\UcpSpec\Services\UCPService;

/**
 * Full UCP metadata for /.well-known/ucp discovery.
 *
 * Schema: UCP Discovery Profile
 */
interface UcpDiscoveryProfile
{
    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return array<string, UCPService>
     */
    public function getServices(): object;

    /**
     * Supported capabilities and extensions.
     *
     * @return CapabilityDiscovery[]
     */
    public function getCapabilities(): array;
}
