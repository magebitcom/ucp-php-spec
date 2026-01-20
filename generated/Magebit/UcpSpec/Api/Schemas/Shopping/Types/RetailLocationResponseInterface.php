<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

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
}
