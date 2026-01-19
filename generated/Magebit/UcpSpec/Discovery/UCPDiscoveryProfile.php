<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Discovery;

use Magebit\UcpSpec\Schemas\DiscoveryProfile;

/**
 * Schema for UCP discovery profile returned from /.well-known/ucp.
 *
 * Schema: UCP Discovery Profile
 */
interface UCPDiscoveryProfile
{
    /**
     * @return DiscoveryProfile
     */
    function getUcp(): DiscoveryProfile;

    /**
     * Payment configuration containing handlers
     *
     * @return object|null
     */
    function getPayment(): object|null;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @return object[]|null
     */
    function getSigningKeys(): array|null;
}
