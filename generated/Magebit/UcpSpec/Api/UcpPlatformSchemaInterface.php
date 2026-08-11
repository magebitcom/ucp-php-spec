<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api;

/**
 * Full UCP metadata for platform-level configuration. Hosted at a URI advertised by the platform in request headers.
 *
 * Schema: UCP Platform Schema
 */
interface UcpPlatformSchemaInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_SERVICES = 'services';
    public const KEY_CAPABILITIES = 'capabilities';
    public const KEY_PAYMENT_HANDLERS = 'payment_handlers';

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * Service registry keyed by reverse-domain name.
     *
     * @return array<string, \Magebit\UcpSpec\Api\ServicePlatformSchemaInterface[]>
     */
    public function getServices(): array;

    /**
     * Service registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\ServicePlatformSchemaInterface[]> $services
     * @return self
     */
    public function setServices(array $services): self;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @return array<string, \Magebit\UcpSpec\Api\CapabilityPlatformSchemaInterface[]>|null
     */
    public function getCapabilities(): array|null;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\CapabilityPlatformSchemaInterface[]>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @return array<string, \Magebit\UcpSpec\Api\PaymentHandlerPlatformSchemaInterface[]>
     */
    public function getPaymentHandlers(): array;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\PaymentHandlerPlatformSchemaInterface[]> $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(array $paymentHandlers): self;
}
