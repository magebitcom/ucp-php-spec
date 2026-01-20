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
 * Embedded transport binding (JSON-RPC 2.0 over postMessage). Unlike REST/MCP, the endpoint is per-capability (i.e. per-checkout via continue_url), not per-service.
 */
interface UCPServiceEmbeddedInterface
{
    /**
     * URL to OpenRPC specification (JSON format) defining the embedded protocol
     *
     * @return string
     */
    public function getSchema(): string;
}
