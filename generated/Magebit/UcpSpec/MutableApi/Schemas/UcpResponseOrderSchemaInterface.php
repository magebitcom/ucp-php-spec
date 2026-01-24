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

/**
 * UCP metadata for order responses. No payment handlers needed post-purchase.
 *
 * Schema: UCP Order Response Schema
 */
interface UcpResponseOrderSchemaInterface
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
     * @return array<string, array>|null
     */
    public function getServices(): array|null;

    /**
     * @return mixed
     */
    public function getCapabilities();

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @return array<string, array>|null
     */
    public function getPaymentHandlers(): array|null;

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * Service registry keyed by reverse-domain name.
     *
     * @param array<string, array>|null $services
     * @return self
     */
    public function setServices(?array $services): self;

    /**
     * @param mixed $capabilities
     * @return self
     */
    public function setCapabilities($capabilities): self;

    /**
     * Payment handler registry keyed by reverse-domain name.
     *
     * @param array<string, array>|null $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(?array $paymentHandlers): self;
}
