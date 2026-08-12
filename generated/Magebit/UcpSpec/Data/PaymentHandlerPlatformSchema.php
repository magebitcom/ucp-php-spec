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

use Magebit\UcpSpec\Api\PaymentHandlerPlatformSchemaInterface;
use Magebit\UcpSpec\Api\Shopping\Types\AvailablePaymentInstrumentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Platform declaration for discovery profiles. May include partial config state required for discovery.
 */
class PaymentHandlerPlatformSchema extends SpecObject implements PaymentHandlerPlatformSchemaInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['config'];

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
     * @return string
     */
    public function getSpec(): string
    {
        return $this->requireString(self::KEY_SPEC);
    }

    /**
     * @param string $spec
     * @return self
     */
    public function setSpec(string $spec): self
    {
        return $this->set(self::KEY_SPEC, $spec);
    }

    /**
     * @return string
     */
    public function getSchema(): string
    {
        return $this->requireString(self::KEY_SCHEMA);
    }

    /**
     * @param string $schema
     * @return self
     */
    public function setSchema(string $schema): self
    {
        return $this->set(self::KEY_SCHEMA, $schema);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->requireString(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getConfig(): array|null
    {
        return $this->arrayOrNull(self::KEY_CONFIG);
    }

    /**
     * @param array<string, mixed>|null $config
     * @return self
     */
    public function setConfig(array|null $config): self
    {
        return $this->set(self::KEY_CONFIG, $config);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\AvailablePaymentInstrumentInterface[]|null
     */
    public function getAvailableInstruments(): array|null
    {
        return $this->instanceListOrNull(self::KEY_AVAILABLE_INSTRUMENTS, \Magebit\UcpSpec\Api\Shopping\Types\AvailablePaymentInstrumentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\AvailablePaymentInstrumentInterface[]|null $availableInstruments
     * @return self
     */
    public function setAvailableInstruments(array|null $availableInstruments): self
    {
        return $this->set(self::KEY_AVAILABLE_INSTRUMENTS, $availableInstruments);
    }
}
