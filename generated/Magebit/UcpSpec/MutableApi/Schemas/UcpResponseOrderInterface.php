<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas;

/**
 * UCP metadata for order responses. No payment handlers needed post-purchase.
 *
 * Schema: UCP Order Response
 */
interface UcpResponseOrderInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_CAPABILITIES = 'capabilities';

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * Active capabilities for this response.
     *
     * @return CapabilityResponseInterface[]
     */
    public function getCapabilities(): array;

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * Active capabilities for this response.
     *
     * @param CapabilityResponseInterface[] $capabilities
     * @return self
     */
    public function setCapabilities(array $capabilities): self;
}
