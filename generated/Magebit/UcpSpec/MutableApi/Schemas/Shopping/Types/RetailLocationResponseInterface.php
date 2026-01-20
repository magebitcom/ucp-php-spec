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
 * Schema: Retail Location Response
 */
interface RetailLocationResponseInterface
{
    /**
     * Unique location identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Location name (e.g., store name).
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Physical address of the location.
     *
     * @return PostalAddressInterface|null
     */
    public function getAddress(): PostalAddressInterface|null;

    /**
     * Unique location identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

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
     * @param PostalAddressInterface|null $address
     * @return self
     */
    public function setAddress(?PostalAddressInterface $address): self;
}
