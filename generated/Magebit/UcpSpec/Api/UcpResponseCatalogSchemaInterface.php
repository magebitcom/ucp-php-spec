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
 * UCP metadata for catalog responses.
 *
 * Schema: UCP Catalog Response Schema
 */
interface UcpResponseCatalogSchemaInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_STATUS = 'status';
    public const KEY_SERVICES = 'services';
    public const KEY_CAPABILITIES = 'capabilities';
    public const KEY_PAYMENT_HANDLERS = 'payment_handlers';
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
     * @return array<string, \Magebit\UcpSpec\Api\ServiceBaseInterface[]>|null
     */
    public function getServices(): array|null;

    /**
     * Service registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\ServiceBaseInterface[]>|null $services
     * @return self
     */
    public function setServices(array|null $services): self;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @return array<string, \Magebit\UcpSpec\Api\CapabilityResponseSchemaInterface[]>|null
     */
    public function getCapabilities(): array|null;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\CapabilityResponseSchemaInterface[]>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @return array<string, \Magebit\UcpSpec\Api\PaymentHandlerBaseInterface[]>|null
     */
    public function getPaymentHandlers(): array|null;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @param array<string, \Magebit\UcpSpec\Api\PaymentHandlerBaseInterface[]>|null $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(array|null $paymentHandlers): self;
}
