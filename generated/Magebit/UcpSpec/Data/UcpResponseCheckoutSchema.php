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

use Magebit\UcpSpec\Api\CapabilityResponseSchemaInterface;
use Magebit\UcpSpec\Api\PaymentHandlerResponseSchemaInterface;
use Magebit\UcpSpec\Api\ServiceResponseSchemaInterface;
use Magebit\UcpSpec\Api\UcpResponseCheckoutSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * UCP metadata for checkout responses.
 */
class UcpResponseCheckoutSchema extends SpecObject implements UcpResponseCheckoutSchemaInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['services', 'capabilities', 'payment_handlers'];

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->get(self::KEY_VERSION);
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
     * @return array<string, \Magebit\UcpSpec\Api\ServiceResponseSchemaInterface[]>|null
     */
    public function getServices(): array|null
    {
        return $this->get(self::KEY_SERVICES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\ServiceResponseSchemaInterface[]>|null $services
     * @return self
     */
    public function setServices(array|null $services): self
    {
        return $this->set(self::KEY_SERVICES, $services);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\CapabilityResponseSchemaInterface[]>|null
     */
    public function getCapabilities(): array|null
    {
        return $this->get(self::KEY_CAPABILITIES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\CapabilityResponseSchemaInterface[]>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self
    {
        return $this->set(self::KEY_CAPABILITIES, $capabilities);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\PaymentHandlerResponseSchemaInterface[]>
     */
    public function getPaymentHandlers(): array
    {
        return $this->getArray(self::KEY_PAYMENT_HANDLERS);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\PaymentHandlerResponseSchemaInterface[]> $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(array $paymentHandlers): self
    {
        return $this->set(self::KEY_PAYMENT_HANDLERS, $paymentHandlers);
    }
}
