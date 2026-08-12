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
 * UCP metadata for business/merchant-level configuration. Subset of platform schema with business-specific settings.
 *
 * Schema: UCP Business Schema
 */
interface UcpBusinessSchemaInterface
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
     * @return array<string, \Magebit\UcpSpec\Api\ServiceBusinessSchemaInterface[]>
     */
    public function getServices(): array;

    /**
     * Service registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\ServiceBusinessSchemaInterface[]> $services
     * @return self
     */
    public function setServices(array $services): self;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @return array<string, \Magebit\UcpSpec\Api\CapabilityBusinessSchemaInterface[]>|null
     */
    public function getCapabilities(): array|null;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\CapabilityBusinessSchemaInterface[]>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @return array<string, \Magebit\UcpSpec\Api\PaymentHandlerBusinessSchemaInterface[]>
     */
    public function getPaymentHandlers(): array;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\PaymentHandlerBusinessSchemaInterface[]> $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(array $paymentHandlers): self;
}
