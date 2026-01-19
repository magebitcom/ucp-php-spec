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
 * REST transport binding
 */
interface UCPServiceRest
{
    /**
     * URL to OpenAPI 3.x specification (JSON format)
     *
     * @return string
     */
    public function getSchema(): string;

    /**
     * Merchant's REST API endpoint
     *
     * @return string
     */
    public function getEndpoint(): string;
}
