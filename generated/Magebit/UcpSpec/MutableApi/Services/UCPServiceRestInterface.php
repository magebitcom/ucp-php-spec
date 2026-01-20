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
 * REST transport binding
 */
interface UCPServiceRestInterface
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

    /**
     * URL to OpenAPI 3.x specification (JSON format)
     *
     * @param string $schema
     * @return self
     */
    public function setSchema(string $schema): self;

    /**
     * Merchant's REST API endpoint
     *
     * @param string $endpoint
     * @return self
     */
    public function setEndpoint(string $endpoint): self;
}
