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
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Full capability declaration for platform-level discovery. Includes spec/schema URLs for agent fetching.
 */
class CapabilityPlatformSchema extends SpecObject implements CapabilityPlatformSchemaInterface
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
     * @return string|null
     */
    public function getExtends(): string|null
    {
        return $this->stringOrNull(self::KEY_EXTENDS);
    }

    /**
     * @param string|null $extends
     * @return self
     */
    public function setExtends(string|null $extends): self
    {
        return $this->set(self::KEY_EXTENDS, $extends);
    }
}
