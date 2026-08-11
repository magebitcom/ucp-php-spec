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
 * Schema for UCP discovery profiles. Business profiles are hosted at /.well-known/ucp; platform profiles are hosted at URIs advertised in request headers.
 *
 * Schema: UCP Discovery Profile
 */
interface ProfileSchemaInterface
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
