<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Discovery;

use Magebit\UcpSpec\Api\Discovery\ProfileSchemaInterface;
use Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface;
use Magebit\UcpSpec\Api\UcpPlatformSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Schema for UCP discovery profiles. Business profiles are hosted at /.well-known/ucp; platform profiles are hosted at URIs advertised in request headers.
 */
class ProfileSchema extends SpecObject implements ProfileSchemaInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpPlatformSchemaInterface
     */
    public function getUcp(): UcpPlatformSchemaInterface
    {
        return $this->get(self::KEY_UCP);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpPlatformSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpPlatformSchemaInterface $ucp): self
    {
        return $this->set(self::KEY_UCP, $ucp);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface[]|null
     */
    public function getSigningKeys(): array|null
    {
        return $this->get(self::KEY_SIGNING_KEYS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface[]|null $signingKeys
     * @return self
     */
    public function setSigningKeys(array|null $signingKeys): self
    {
        return $this->set(self::KEY_SIGNING_KEYS, $signingKeys);
    }
}
