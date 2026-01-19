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

/**
 * Full UCP metadata for /.well-known/ucp discovery.
 *
 * Schema: UCP Discovery Profile
 */
interface DiscoveryProfile
{
    /**
     * @return Version
     */
    function getVersion(): Version;

    /**
     * @return Services
     */
    function getServices(): Services;

    /**
     * Supported capabilities and extensions.
     *
     * @return Discovery[]
     */
    function getCapabilities(): array;
}
