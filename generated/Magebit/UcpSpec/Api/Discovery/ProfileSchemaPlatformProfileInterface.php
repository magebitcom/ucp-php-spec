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

use Magebit\UcpSpec\Api\UcpPlatformSchemaInterface;

/**
 * Full discovery profile for platforms. Exposes complete service, capability, and payment handler registries.
 *
 * Schema: UCP Platform Discovery Profile
 */
interface ProfileSchemaPlatformProfileInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_SIGNING_KEYS = 'signing_keys';

    /**
     * @return \Magebit\UcpSpec\Api\UcpPlatformSchemaInterface
     */
    public function getUcp(): UcpPlatformSchemaInterface;

    /**
     * @param \Magebit\UcpSpec\Api\UcpPlatformSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpPlatformSchemaInterface $ucp): self;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @return \Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface[]|null
     */
    public function getSigningKeys(): array|null;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @param \Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface[]|null $signingKeys
     * @return self
     */
    public function setSigningKeys(array|null $signingKeys): self;
}
