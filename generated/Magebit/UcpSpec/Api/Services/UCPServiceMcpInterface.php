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
 * MCP transport binding
 */
interface UCPServiceMcpInterface
{
    public const KEY_SCHEMA = 'schema';
    public const KEY_ENDPOINT = 'endpoint';

    /**
     * URL to OpenRPC specification (JSON format)
     *
     * @return string
     */
    public function getSchema(): string;

    /**
     * Merchant's MCP endpoint
     *
     * @return string
     */
    public function getEndpoint(): string;
}
