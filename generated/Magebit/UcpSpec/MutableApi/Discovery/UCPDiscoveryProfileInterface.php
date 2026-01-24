<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Discovery;

use Magebit\UcpSpec\MutableApi\Schemas\UcpPlatformSchemaInterface;

/**
 * Schema for UCP discovery profiles. Business profiles are hosted at /.well-known/ucp; platform profiles are hosted at URIs advertised in request headers.
 *
 * Schema: UCP Discovery Profile
 */
interface UCPDiscoveryProfileInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_SIGNING_KEYS = 'signing_keys';

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\UcpPlatformSchemaInterface
     */
    public function getUcp(): UcpPlatformSchemaInterface;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @return \Magebit\UcpSpec\MutableApi\Discovery\SigningKeyInterface[]|null
     */
    public function getSigningKeys(): array|null;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\UcpPlatformSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpPlatformSchemaInterface $ucp): self;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @param \Magebit\UcpSpec\MutableApi\Discovery\SigningKeyInterface[]|null $signingKeys
     * @return self
     */
    public function setSigningKeys(?array $signingKeys): self;
}
