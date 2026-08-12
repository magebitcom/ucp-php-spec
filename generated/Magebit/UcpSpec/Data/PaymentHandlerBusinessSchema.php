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

use Magebit\UcpSpec\Api\PaymentHandlerBusinessSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Business declaration for discovery profiles. May include partial config state required for discovery.
 */
class PaymentHandlerBusinessSchema extends SpecObject implements PaymentHandlerBusinessSchemaInterface
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
}
