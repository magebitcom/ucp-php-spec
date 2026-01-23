<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Services;

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
     * @return \Magebit\UcpSpec\MutableApi\Services\UCPServiceRestInterface|null
     */
    public function getRest(): UCPServiceRestInterface|null;

    /**
     * MCP transport binding
     *
     * @return \Magebit\UcpSpec\MutableApi\Services\UCPServiceMcpInterface|null
     */
    public function getMcp(): UCPServiceMcpInterface|null;

    /**
     * A2A transport binding
     *
     * @return \Magebit\UcpSpec\MutableApi\Services\UCPServiceA2aInterface|null
     */
    public function getA2a(): UCPServiceA2aInterface|null;

    /**
     * Embedded transport binding (JSON-RPC 2.0 over postMessage). Unlike REST/MCP, the endpoint is per-capability (i.e. per-checkout via continue_url), not per-service.
     *
     * @return \Magebit\UcpSpec\MutableApi\Services\UCPServiceEmbeddedInterface|null
     */
    public function getEmbedded(): UCPServiceEmbeddedInterface|null;

    /**
     * Service version in YYYY-MM-DD format.
     *
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * URL to service documentation. Origin MUST match namespace authority.
     *
     * @param string $spec
     * @return self
     */
    public function setSpec(string $spec): self;

    /**
     * REST transport binding
     *
     * @param \Magebit\UcpSpec\MutableApi\Services\UCPServiceRestInterface|null $rest
     * @return self
     */
    public function setRest(?UCPServiceRestInterface $rest): self;

    /**
     * MCP transport binding
     *
     * @param \Magebit\UcpSpec\MutableApi\Services\UCPServiceMcpInterface|null $mcp
     * @return self
     */
    public function setMcp(?UCPServiceMcpInterface $mcp): self;

    /**
     * A2A transport binding
     *
     * @param \Magebit\UcpSpec\MutableApi\Services\UCPServiceA2aInterface|null $a2a
     * @return self
     */
    public function setA2a(?UCPServiceA2aInterface $a2a): self;

    /**
     * Embedded transport binding (JSON-RPC 2.0 over postMessage). Unlike REST/MCP, the endpoint is per-capability (i.e. per-checkout via continue_url), not per-service.
     *
     * @param \Magebit\UcpSpec\MutableApi\Services\UCPServiceEmbeddedInterface|null $embedded
     * @return self
     */
    public function setEmbedded(?UCPServiceEmbeddedInterface $embedded): self;
}
