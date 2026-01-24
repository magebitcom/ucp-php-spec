<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Discovery;

use Magebit\UcpSpec\Api\Schemas\UcpPlatformSchemaInterface;

/**
 * Full discovery profile for platforms. Exposes complete service, capability, and payment handler registries.
 *
 * Schema: UCP Platform Discovery Profile
 */
interface PlatformProfileInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_SIGNING_KEYS = 'signing_keys';

    /**
     * @return \Magebit\UcpSpec\Api\Schemas\UcpPlatformSchemaInterface
     */
    public function getUcp(): UcpPlatformSchemaInterface;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @return \Magebit\UcpSpec\Api\Discovery\SigningKeyInterface[]|null
     */
    public function getSigningKeys(): array|null;
}
