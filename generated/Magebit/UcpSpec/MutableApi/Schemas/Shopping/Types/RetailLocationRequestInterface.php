<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

/**
 * A pickup location (retail store, locker, etc.).
 *
 * Schema: Retail Location Request
 */
interface RetailLocationRequestInterface
{
    public const KEY_NAME = 'name';
    public const KEY_ADDRESS = 'address';

    /**
     * Location name (e.g., store name).
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Physical address of the location.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PostalAddressInterface|null
     */
    public function getAddress(): PostalAddressInterface|null;

    /**
     * Location name (e.g., store name).
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * Physical address of the location.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\PostalAddressInterface|null $address
     * @return self
     */
    public function setAddress(?PostalAddressInterface $address): self;
}
