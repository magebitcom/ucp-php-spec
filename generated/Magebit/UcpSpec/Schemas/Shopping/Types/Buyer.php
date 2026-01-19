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

interface Buyer
{
    /**
     * First name of the buyer.
     *
     * @return string|null
     */
    function getFirstName(): string|null;

    /**
     * Last name of the buyer.
     *
     * @return string|null
     */
    function getLastName(): string|null;

    /**
     * Optional, buyer's full name (if first_name or last_name fields are present they take precedence).
     *
     * @return string|null
     */
    function getFullName(): string|null;

    /**
     * Email of the buyer.
     *
     * @return string|null
     */
    function getEmail(): string|null;

    /**
     * E.164 standard.
     *
     * @return string|null
     */
    function getPhoneNumber(): string|null;
}
