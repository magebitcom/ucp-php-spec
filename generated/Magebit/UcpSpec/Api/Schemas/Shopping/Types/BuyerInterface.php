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
 * Schema: Buyer
 */
interface BuyerInterface
{
    public const KEY_FIRST_NAME = 'first_name';
    public const KEY_LAST_NAME = 'last_name';
    public const KEY_EMAIL = 'email';
    public const KEY_PHONE_NUMBER = 'phone_number';

    /**
     * First name of the buyer.
     *
     * @return string|null
     */
    public function getFirstName(): string|null;

    /**
     * Last name of the buyer.
     *
     * @return string|null
     */
    public function getLastName(): string|null;

    /**
     * Email of the buyer.
     *
     * @return string|null
     */
    public function getEmail(): string|null;

    /**
     * E.164 standard.
     *
     * @return string|null
     */
    public function getPhoneNumber(): string|null;
}
