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
    public const KEY_STATUS = 'status';
    public const KEY_SERVICES = 'services';
    public const KEY_CAPABILITIES = 'capabilities';
    public const KEY_PAYMENT_HANDLERS = 'payment_handlers';
    public const KEY_SUPPORTED_VERSIONS = 'supported_versions';
    public const STATUS_SUCCESS = 'success';
    public const STATUS_ERROR = 'error';
    public const CONSTRAINTS = ['version' => ['pattern' => '^\d{4}-\d{2}-\d{2}$']];

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
     * Application-level status of the UCP operation.
     *
     * @return string|null
     */
    public function getStatus(): string|null;

    /**
     * Application-level status of the UCP operation.
     *
     * @param string|null $status
     * @return self
     */
    public function setStatus(string|null $status): self;

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

    /**
     * Previous protocol versions this business supports, mapped to profile URIs. Businesses that support older protocol versions SHOULD advertise each version and link to its profile. Each URI points to a complete, self-contained profile for that version. When omitted, only `version` is supported.
     *
     * @return array<string, string>|null
     */
    public function getSupportedVersions(): array|null;

    /**
     * Previous protocol versions this business supports, mapped to profile URIs. Businesses that support older protocol versions SHOULD advertise each version and link to its profile. Each URI points to a complete, self-contained profile for that version. When omitted, only `version` is supported.
     *
     * @param array<string, string>|null $supportedVersions
     * @return self
     */
    public function setSupportedVersions(array|null $supportedVersions): self;
}
