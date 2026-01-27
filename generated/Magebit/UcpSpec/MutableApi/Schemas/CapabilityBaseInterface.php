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

interface CapabilityBaseInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_SPEC = 'spec';
    public const KEY_SCHEMA = 'schema';
    public const KEY_ID = 'id';
    public const KEY_CONFIG = 'config';
    public const KEY_EXTENDS = 'extends';

    /**
     * Entity version in YYYY-MM-DD format.
     *
     * @return string
     */
    public function getVersion(): string;

    /**
     * URL to human-readable specification document.
     *
     * @return string|null
     */
    public function getSpec(): string|null;

    /**
     * URL to JSON Schema defining this entity's structure and payloads.
     *
     * @return string|null
     */
    public function getSchema(): string|null;

    /**
     * Unique identifier for this entity instance. Used to disambiguate when multiple instances exist.
     *
     * @return string|null
     */
    public function getId(): string|null;

    /**
     * Entity-specific configuration. Structure defined by each entity's schema.
     *
     * @return array<mixed>|null
     */
    public function getConfig(): array|null;

    /**
     * Parent capability this extends. Present for extensions, absent for root capabilities.
     *
     * @return string|null
     */
    public function getExtends(): string|null;

    /**
     * Entity version in YYYY-MM-DD format.
     *
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * URL to human-readable specification document.
     *
     * @param string|null $spec
     * @return self
     */
    public function setSpec(?string $spec): self;

    /**
     * URL to JSON Schema defining this entity's structure and payloads.
     *
     * @param string|null $schema
     * @return self
     */
    public function setSchema(?string $schema): self;

    /**
     * Unique identifier for this entity instance. Used to disambiguate when multiple instances exist.
     *
     * @param string|null $id
     * @return self
     */
    public function setId(?string $id): self;

    /**
     * Entity-specific configuration. Structure defined by each entity's schema.
     *
     * @param array<mixed>|null $config
     * @return self
     */
    public function setConfig(?array $config): self;

    /**
     * Parent capability this extends. Present for extensions, absent for root capabilities.
     *
     * @param string|null $extends
     * @return self
     */
    public function setExtends(?string $extends): self;
}
