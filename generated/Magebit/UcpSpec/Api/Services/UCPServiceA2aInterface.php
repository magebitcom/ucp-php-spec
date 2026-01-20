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
}
