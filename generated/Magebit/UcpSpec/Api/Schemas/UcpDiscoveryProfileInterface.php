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

use Magebit\UcpSpec\Api\Services\UCPServiceInterface;

/**
 * Full UCP metadata for /.well-known/ucp discovery.
 *
 * Schema: UCP Discovery Profile
 */
interface UcpDiscoveryProfileInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_SERVICES = 'services';
    public const KEY_CAPABILITIES = 'capabilities';

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return array<string, \Magebit\UcpSpec\Api\Services\UCPServiceInterface>
     */
    public function getServices(): array;

    /**
     * Supported capabilities and extensions.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\CapabilityDiscoveryInterface[]
     */
    public function getCapabilities(): array;
}
