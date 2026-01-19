<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * A pickup location (retail store, locker, etc.).
 *
 * Schema: Retail Location Response
 */
interface RetailLocationResponse
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
     * @return PostalAddress|null
     */
    public function getAddress(): PostalAddress|null;
}
