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

use Magebit\UcpSpec\Api\CapabilityBaseInterface;
use Magebit\UcpSpec\Api\PaymentHandlerBaseInterface;
use Magebit\UcpSpec\Api\ServiceBaseInterface;
use Magebit\UcpSpec\Api\UcpBaseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Base UCP metadata with shared properties for all schema types.
 */
class UcpBase extends SpecObject implements UcpBaseInterface
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
     * @return array<string, \Magebit\UcpSpec\Api\ServiceBaseInterface[]>|null
     */
    public function getServices(): array|null
    {
        return $this->arrayOrNull(self::KEY_SERVICES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\ServiceBaseInterface[]>|null $services
     * @return self
     */
    public function setServices(array|null $services): self
    {
        return $this->set(self::KEY_SERVICES, $services);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\CapabilityBaseInterface[]>|null
     */
    public function getCapabilities(): array|null
    {
        return $this->arrayOrNull(self::KEY_CAPABILITIES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\CapabilityBaseInterface[]>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self
    {
        return $this->set(self::KEY_CAPABILITIES, $capabilities);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\PaymentHandlerBaseInterface[]>|null
     */
    public function getPaymentHandlers(): array|null
    {
        return $this->arrayOrNull(self::KEY_PAYMENT_HANDLERS);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\PaymentHandlerBaseInterface[]>|null $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(array|null $paymentHandlers): self
    {
        return $this->set(self::KEY_PAYMENT_HANDLERS, $paymentHandlers);
    }
}
