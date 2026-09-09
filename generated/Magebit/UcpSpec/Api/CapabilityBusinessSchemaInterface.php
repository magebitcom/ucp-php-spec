<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api;

/**
 * Capability configuration for business/merchant level. May include business-specific config overrides.
 *
 * Schema: Capability (Business Schema)
 */
interface CapabilityBusinessSchemaInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_SPEC = 'spec';
    public const KEY_SCHEMA = 'schema';
    public const KEY_ID = 'id';
    public const KEY_CONFIG = 'config';
    public const KEY_EXTENDS = 'extends';

    public const CONSTRAINTS = [
        'version' => ['pattern' => '^\d{4}-\d{2}-\d{2}$'],
        'spec' => ['format' => 'uri'],
        'schema' => ['format' => 'uri'],
    ];

    /**
     * Entity version in YYYY-MM-DD format.
     *
     * @return string
     */
    public function getVersion(): string;

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
     * @return string|null
     */
    public function getSpec(): string|null;

    /**
     * URL to human-readable specification document.
     *
     * @param string|null $spec
     * @return self
     */
    public function setSpec(string|null $spec): self;

    /**
     * URL to JSON Schema defining this entity's structure and payloads.
     *
     * @return string|null
     */
    public function getSchema(): string|null;

    /**
     * URL to JSON Schema defining this entity's structure and payloads.
     *
     * @param string|null $schema
     * @return self
     */
    public function setSchema(string|null $schema): self;

    /**
     * Unique identifier for this entity instance. Used to disambiguate when multiple instances exist.
     *
     * @return string|null
     */
    public function getId(): string|null;

    /**
     * Unique identifier for this entity instance. Used to disambiguate when multiple instances exist.
     *
     * @param string|null $id
     * @return self
     */
    public function setId(string|null $id): self;

    /**
     * Entity-specific configuration. Structure defined by each entity's schema.
     *
     * @return array<string, mixed>|null
     */
    public function getConfig(): array|null;

    /**
     * Entity-specific configuration. Structure defined by each entity's schema.
     *
     * @param array<string, mixed>|null $config
     * @return self
     */
    public function setConfig(array|null $config): self;

    /**
     * Parent capability(s) this extends. Present for extensions, absent for root capabilities. Use array for multi-parent extensions.
     *
     * @return string|array|null
     */
    public function getExtends(): string|array|null;

    /**
     * Parent capability(s) this extends. Present for extensions, absent for root capabilities. Use array for multi-parent extensions.
     *
     * @param string|array|null $extends
     * @return self
     */
    public function setExtends(string|array|null $extends): self;
}
