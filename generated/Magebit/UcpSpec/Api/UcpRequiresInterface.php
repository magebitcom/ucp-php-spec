<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api;

/**
 * Version requirements for extension schemas. Declares minimum (and optionally maximum) protocol and capability versions needed for correct operation.
 */
interface UcpRequiresInterface
{
    public const KEY_PROTOCOL = 'protocol';
    public const KEY_CAPABILITIES = 'capabilities';

    /**
     * Required protocol version.
     *
     * @return \Magebit\UcpSpec\Api\UcpVersionConstraintInterface|null
     */
    public function getProtocol(): UcpVersionConstraintInterface|null;

    /**
     * Required protocol version.
     *
     * @param \Magebit\UcpSpec\Api\UcpVersionConstraintInterface|null $protocol
     * @return self
     */
    public function setProtocol(UcpVersionConstraintInterface|null $protocol): self;

    /**
     * Required capability versions, keyed by capability name. Keys must be a subset of the extension's $defs keys.
     *
     * @return array<string, \Magebit\UcpSpec\Api\UcpVersionConstraintInterface>|null
     */
    public function getCapabilities(): array|null;

    /**
     * Required capability versions, keyed by capability name. Keys must be a subset of the extension's $defs keys.
     *
     * @param array<string, \Magebit\UcpSpec\Api\UcpVersionConstraintInterface>|null $capabilities
     * @return self
     */
    public function setCapabilities(array|null $capabilities): self;
}
