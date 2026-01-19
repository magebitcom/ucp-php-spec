<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Services;

/**
 * Schema for UCP service definitions. A service defines the API surface for a vertical (shopping, common, etc.) with transport bindings.
 *
 * Schema: UCP Service
 */
interface UCPService
{
    /**
     * Service version in YYYY-MM-DD format.
     *
     * @return string
     */
    public function getVersion(): string;

    /**
     * URL to service documentation. Origin MUST match namespace authority.
     *
     * @return string
     */
    public function getSpec(): string;

    /**
     * REST transport binding
     *
     * @return object|null
     */
    public function getRest(): object|null;

    /**
     * MCP transport binding
     *
     * @return object|null
     */
    public function getMcp(): object|null;

    /**
     * A2A transport binding
     *
     * @return object|null
     */
    public function getA2a(): object|null;

    /**
     * Embedded transport binding (JSON-RPC 2.0 over postMessage). Unlike REST/MCP, the endpoint is per-capability (i.e. per-checkout via continue_url), not per-service.
     *
     * @return object|null
     */
    public function getEmbedded(): object|null;
}
