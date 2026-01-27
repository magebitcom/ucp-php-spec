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
     * Service registry keyed by reverse-domain name.
     *
     * @return array<string, array<\Magebit\UcpSpec\Api\Schemas\ServicePlatformSchemaInterface>>
     */
    public function getServices(): array;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @return array<string, array<\Magebit\UcpSpec\Api\Schemas\CapabilityPlatformSchemaInterface>>|null
     */
    public function getCapabilities(): array|null;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @return array<string, array<\Magebit\UcpSpec\Api\Schemas\PaymentHandlerPlatformSchemaInterface>>
     */
    public function getPaymentHandlers(): array;
}
