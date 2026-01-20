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
 * A2A transport binding
 */
interface UCPServiceA2aInterface
{
    public const KEY_ENDPOINT = 'endpoint';

    /**
     * Merchant's Agent Card endpoint
     *
     * @return string
     */
    public function getEndpoint(): string;

    /**
     * Merchant's Agent Card endpoint
     *
     * @param string $endpoint
     * @return self
     */
    public function setEndpoint(string $endpoint): self;
}
