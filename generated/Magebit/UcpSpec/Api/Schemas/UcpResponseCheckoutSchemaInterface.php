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
 * UCP metadata for checkout responses.
 *
 * Schema: UCP Checkout Response Schema
 */
interface UcpResponseCheckoutSchemaInterface
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
     * @return array<string, array<\Magebit\UcpSpec\Api\Schemas\ServiceResponseSchemaInterface>>|null
     */
    public function getServices(): array|null;

    /**
     * Capability registry keyed by reverse-domain name.
     *
     * @return array<string, array<\Magebit\UcpSpec\Api\Schemas\CapabilityResponseSchemaInterface>>|null
     */
    public function getCapabilities(): array|null;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @return array<string, array<\Magebit\UcpSpec\Api\Schemas\PaymentHandlerResponseSchemaInterface>>
     */
    public function getPaymentHandlers(): array;
}
