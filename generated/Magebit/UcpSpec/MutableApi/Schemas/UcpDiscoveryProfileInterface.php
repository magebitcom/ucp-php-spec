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
    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return array<string, UCPServiceInterface>
     */
    public function getServices(): object;

    /**
     * Supported capabilities and extensions.
     *
     * @return CapabilityDiscoveryInterface[]
     */
    public function getCapabilities(): array;

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * @param array<string, UCPServiceInterface> $services
     * @return self
     */
    public function setServices(object $services): self;

    /**
     * Supported capabilities and extensions.
     *
     * @param CapabilityDiscoveryInterface[] $capabilities
     * @return self
     */
    public function setCapabilities(array $capabilities): self;
}
