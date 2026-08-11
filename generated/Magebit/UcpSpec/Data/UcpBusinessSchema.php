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

use Magebit\UcpSpec\Api\CapabilityBusinessSchemaInterface;
use Magebit\UcpSpec\Api\PaymentHandlerBusinessSchemaInterface;
use Magebit\UcpSpec\Api\ServiceBusinessSchemaInterface;
use Magebit\UcpSpec\Api\UcpBusinessSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * UCP metadata for business/merchant-level configuration. Subset of platform schema with business-specific settings.
 */
class UcpBusinessSchema extends SpecObject implements UcpBusinessSchemaInterface
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
     * @return array<string, \Magebit\UcpSpec\Api\ServiceBusinessSchemaInterface[]>
     */
    public function getServices(): array
    {
        return $this->getArray(self::KEY_SERVICES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\ServiceBusinessSchemaInterface[]> $services
     * @return self
     */
    public function setServices(array $services): self
    {
        return $this->set(self::KEY_SERVICES, $services);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\CapabilityBusinessSchemaInterface[]>|null
     */
    public function getCapabilities(): array|null
    {
        return $this->get(self::KEY_CAPABILITIES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\CapabilityBusinessSchemaInterface[]>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self
    {
        return $this->set(self::KEY_CAPABILITIES, $capabilities);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\PaymentHandlerBusinessSchemaInterface[]>
     */
    public function getPaymentHandlers(): array
    {
        return $this->getArray(self::KEY_PAYMENT_HANDLERS);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\PaymentHandlerBusinessSchemaInterface[]> $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers(array $paymentHandlers): self
    {
        return $this->set(self::KEY_PAYMENT_HANDLERS, $paymentHandlers);
    }
}
