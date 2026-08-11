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

use Magebit\UcpSpec\Api\Discovery\ProfileSchemaBusinessProfileInterface;
use Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface;
use Magebit\UcpSpec\Api\UcpBusinessSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Discovery profile for businesses/merchants. Subset of platform profile with business-specific configuration.
 */
class ProfileSchemaBusinessProfile extends SpecObject implements ProfileSchemaBusinessProfileInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpBusinessSchemaInterface
     */
    public function getUcp(): UcpBusinessSchemaInterface
    {
        return $this->requireInstance(self::KEY_UCP, \Magebit\UcpSpec\Api\UcpBusinessSchemaInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpBusinessSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpBusinessSchemaInterface $ucp): self
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
