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

use Magebit\UcpSpec\Api\Discovery\ProfileSchemaBaseInterface;
use Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface;
use Magebit\UcpSpec\Api\UcpBaseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Base discovery profile with shared properties for all profile types.
 */
class ProfileSchemaBase extends SpecObject implements ProfileSchemaBaseInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpBaseInterface
     */
    public function getUcp(): UcpBaseInterface
    {
        return $this->requireInstance(self::KEY_UCP, \Magebit\UcpSpec\Api\UcpBaseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpBaseInterface $ucp
     * @return self
     */
    public function setUcp(UcpBaseInterface $ucp): self
    {
        return $this->set(self::KEY_UCP, $ucp);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface[]|null
     */
    public function getSigningKeys(): array|null
    {
        return $this->instanceListOrNull(self::KEY_SIGNING_KEYS, \Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface::class);
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
