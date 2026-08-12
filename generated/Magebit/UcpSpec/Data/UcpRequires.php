<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data;

use Magebit\UcpSpec\Api\UcpRequiresInterface;
use Magebit\UcpSpec\Api\UcpVersionConstraintInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Version requirements for extension schemas. Declares minimum (and optionally maximum) protocol and capability versions needed for correct operation.
 */
class UcpRequires extends SpecObject implements UcpRequiresInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['capabilities'];

    /**
     * @return \Magebit\UcpSpec\Api\UcpVersionConstraintInterface|null
     */
    public function getProtocol(): UcpVersionConstraintInterface|null
    {
        return $this->instanceOrNull(self::KEY_PROTOCOL, \Magebit\UcpSpec\Api\UcpVersionConstraintInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpVersionConstraintInterface|null $protocol
     * @return self
     */
    public function setProtocol(UcpVersionConstraintInterface|null $protocol): self
    {
        return $this->set(self::KEY_PROTOCOL, $protocol);
    }

    /**
     * @return array<string, \Magebit\UcpSpec\Api\UcpVersionConstraintInterface>|null
     */
    public function getCapabilities(): array|null
    {
        return $this->arrayOrNull(self::KEY_CAPABILITIES);
    }

    /**
     * @param array<string, \Magebit\UcpSpec\Api\UcpVersionConstraintInterface>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self
    {
        return $this->set(self::KEY_CAPABILITIES, $capabilities);
    }
}
