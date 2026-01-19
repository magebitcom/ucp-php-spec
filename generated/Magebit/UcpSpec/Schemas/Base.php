<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas;

interface Base
{
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
     * @return object|null
     */
    public function getConfig(): object|null;
}
