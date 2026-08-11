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

use Magebit\UcpSpec\Api\ServiceResponseSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Service binding in API responses. Includes per-resource transport configuration via typed config.
 */
class ServiceResponseSchema extends SpecObject implements ServiceResponseSchemaInterface
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
     * @return string|null
     */
    public function getSpec(): string|null
    {
        return $this->stringOrNull(self::KEY_SPEC);
    }

    /**
     * @param string|null $spec
     * @return self
     */
    public function setSpec(string|null $spec): self
    {
        return $this->set(self::KEY_SPEC, $spec);
    }

    /**
     * @return string|null
     */
    public function getSchema(): string|null
    {
        return $this->stringOrNull(self::KEY_SCHEMA);
    }

    /**
     * @param string|null $schema
     * @return self
     */
    public function setSchema(string|null $schema): self
    {
        return $this->set(self::KEY_SCHEMA, $schema);
    }

    /**
     * @return string|null
     */
    public function getId(): string|null
    {
        return $this->stringOrNull(self::KEY_ID);
    }

    /**
     * @param string|null $id
     * @return self
     */
    public function setId(string|null $id): self
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
     * @return string
     */
    public function getTransport(): string
    {
        return $this->requireString(self::KEY_TRANSPORT);
    }

    /**
     * @param string $transport
     * @return self
     */
    public function setTransport(string $transport): self
    {
        return $this->set(self::KEY_TRANSPORT, $transport);
    }

    /**
     * @return string|null
     */
    public function getEndpoint(): string|null
    {
        return $this->stringOrNull(self::KEY_ENDPOINT);
    }

    /**
     * @param string|null $endpoint
     * @return self
     */
    public function setEndpoint(string|null $endpoint): self
    {
        return $this->set(self::KEY_ENDPOINT, $endpoint);
    }
}
