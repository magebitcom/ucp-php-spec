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
    public const KEY_NAME = 'name';
    public const KEY_VERSION = 'version';
    public const KEY_SPEC = 'spec';
    public const KEY_SCHEMA = 'schema';
    public const KEY_EXTENDS = 'extends';
    public const KEY_CONFIG = 'config';

    /**
     * Stable capability identifier in reverse-domain notation (e.g., dev.ucp.shopping.checkout). Used in capability negotiation.
     *
     * @return string|null
     */
    public function getName(): string|null;

    /**
     * Capability version in YYYY-MM-DD format.
     *
     * @return string|null
     */
    public function getVersion(): string|null;

    /**
     * URL to human-readable specification document.
     *
     * @return string|null
     */
    public function getSpec(): string|null;

    /**
     * URL to JSON Schema for this capability's payload.
     *
     * @return string|null
     */
    public function getSchema(): string|null;

    /**
     * Parent capability this extends. Present for extensions, absent for root capabilities.
     *
     * @return string|null
     */
    public function getExtends(): string|null;

    /**
     * Capability-specific configuration (structure defined by each capability).
     *
     * @return array<mixed>|null
     */
    public function getConfig(): array|null;

    /**
     * Stable capability identifier in reverse-domain notation (e.g., dev.ucp.shopping.checkout). Used in capability negotiation.
     *
     * @param string|null $name
     * @return self
     */
    public function setName(?string $name): self;

    /**
     * Capability version in YYYY-MM-DD format.
     *
     * @param string|null $version
     * @return self
     */
    public function setVersion(?string $version): self;

    /**
     * URL to human-readable specification document.
     *
     * @param string|null $spec
     * @return self
     */
    public function setSpec(?string $spec): self;

    /**
     * URL to JSON Schema for this capability's payload.
     *
     * @param string|null $schema
     * @return self
     */
    public function setSchema(?string $schema): self;

    /**
     * Parent capability this extends. Present for extensions, absent for root capabilities.
     *
     * @param string|null $extends
     * @return self
     */
    public function setExtends(?string $extends): self;

    /**
     * Capability-specific configuration (structure defined by each capability).
     *
     * @param array<mixed>|null $config
     * @return self
     */
    public function setConfig(?array $config): self;
}
