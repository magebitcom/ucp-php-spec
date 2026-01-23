<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas;

use Magebit\UcpSpec\MutableApi\Services\UCPServiceInterface;

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
     * @return array<string, \Magebit\UcpSpec\MutableApi\Services\UCPServiceInterface>
     */
    public function getServices(): array;

    /**
     * Supported capabilities and extensions.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\CapabilityDiscoveryInterface[]
     */
    public function getCapabilities(): array;

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * @param array<string, \Magebit\UcpSpec\MutableApi\Services\UCPServiceInterface> $services
     * @return self
     */
    public function setServices(array $services): self;

    /**
     * Supported capabilities and extensions.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\CapabilityDiscoveryInterface[] $capabilities
     * @return self
     */
    public function setCapabilities(array $capabilities): self;
}
