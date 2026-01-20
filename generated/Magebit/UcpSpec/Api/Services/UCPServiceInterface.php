<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Services;

/**
 * Schema for UCP service definitions. A service defines the API surface for a vertical (shopping, common, etc.) with transport bindings.
 *
 * Schema: UCP Service
 */
interface UCPServiceInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_SPEC = 'spec';
    public const KEY_REST = 'rest';
    public const KEY_MCP = 'mcp';
    public const KEY_A2A = 'a2a';
    public const KEY_EMBEDDED = 'embedded';

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
     * @return UCPServiceRestInterface|null
     */
    public function getRest(): UCPServiceRestInterface|null;

    /**
     * MCP transport binding
     *
     * @return UCPServiceMcpInterface|null
     */
    public function getMcp(): UCPServiceMcpInterface|null;

    /**
     * A2A transport binding
     *
     * @return UCPServiceA2aInterface|null
     */
    public function getA2a(): UCPServiceA2aInterface|null;

    /**
     * Embedded transport binding (JSON-RPC 2.0 over postMessage). Unlike REST/MCP, the endpoint is per-capability (i.e. per-checkout via continue_url), not per-service.
     *
     * @return UCPServiceEmbeddedInterface|null
     */
    public function getEmbedded(): UCPServiceEmbeddedInterface|null;
}
