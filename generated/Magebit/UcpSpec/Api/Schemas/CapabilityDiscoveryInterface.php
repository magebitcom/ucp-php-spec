<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas;

/**
 * Full capability declaration for discovery profiles. Includes spec/schema URLs for agent fetching.
 *
 * Schema: Capability (Discovery)
 */
interface CapabilityDiscoveryInterface
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
     * @return string
     */
    public function getName(): string;

    /**
     * Capability version in YYYY-MM-DD format.
     *
     * @return string
     */
    public function getVersion(): string;

    /**
     * URL to human-readable specification document.
     *
     * @return string
     */
    public function getSpec(): string;

    /**
     * URL to JSON Schema for this capability's payload.
     *
     * @return string
     */
    public function getSchema(): string;

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
}
