<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data;

use Magebit\UcpSpec\Api\CapabilityPlatformSchemaInterface;
use Magebit\UcpSpec\Api\PaymentHandlerPlatformSchemaInterface;
use Magebit\UcpSpec\Api\ServicePlatformSchemaInterface;
use Magebit\UcpSpec\Api\UcpPlatformSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Full UCP metadata for platform-level configuration. Hosted at a URI advertised by the platform in request headers.
 */
class UcpPlatformSchema extends SpecObject implements UcpPlatformSchemaInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['services', 'capabilities', 'payment_handlers'];

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->requireString(self::KEY_VERSION);
    }

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self
    {
        return $this->set(self::KEY_VERSION, $version);
    }

    /**
     * @return string|null
     */
    public function getStatus(): string|null
    {
        return $this->stringOrNull(self::KEY_STATUS);
    }

    /**
     * @param string|null $status
     * @return self
     */
    public function setStatus(string|null $status): self
    {
        return $this->set(self::KEY_STATUS, $status);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\ServicePlatformSchemaInterface[]>
     */
    public function getServices(): array
    {
        return $this->getArray(self::KEY_SERVICES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\ServicePlatformSchemaInterface[]> $services
     * @return self
     */
    public function setServices(array $services): self
    {
        return $this->set(self::KEY_SERVICES, $services);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\CapabilityPlatformSchemaInterface[]>|null
     */
    public function getCapabilities(): array|null
    {
        return $this->arrayOrNull(self::KEY_CAPABILITIES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\CapabilityPlatformSchemaInterface[]>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self
    {
        return $this->set(self::KEY_CAPABILITIES, $capabilities);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\PaymentHandlerPlatformSchemaInterface[]>
     */
    public function getPaymentHandlers(): array
    {
        return $this->getArray(self::KEY_PAYMENT_HANDLERS);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\PaymentHandlerPlatformSchemaInterface[]> $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(array $paymentHandlers): self
    {
        return $this->set(self::KEY_PAYMENT_HANDLERS, $paymentHandlers);
    }
}
