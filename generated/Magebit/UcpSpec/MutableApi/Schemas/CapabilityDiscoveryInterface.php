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

/**
 * Full capability declaration for discovery profiles. Includes spec/schema URLs for agent fetching.
 *
 * Schema: Capability (Discovery)
 */
interface CapabilityDiscoveryInterface
{
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
     * @return object|null
     */
    public function getConfig(): object|null;

    /**
     * Stable capability identifier in reverse-domain notation (e.g., dev.ucp.shopping.checkout). Used in capability negotiation.
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * Capability version in YYYY-MM-DD format.
     *
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * URL to human-readable specification document.
     *
     * @param string $spec
     * @return self
     */
    public function setSpec(string $spec): self;

    /**
     * URL to JSON Schema for this capability's payload.
     *
     * @param string $schema
     * @return self
     */
    public function setSchema(string $schema): self;

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
     * @param object|null $config
     * @return self
     */
    public function setConfig(?object $config): self;
}
