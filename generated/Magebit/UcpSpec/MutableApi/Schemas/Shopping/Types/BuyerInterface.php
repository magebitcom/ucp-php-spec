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

    /**
     * First name of the buyer.
     *
     * @param string|null $firstName
     * @return self
     */
    public function setFirstName(?string $firstName): self;

    /**
     * Last name of the buyer.
     *
     * @param string|null $lastName
     * @return self
     */
    public function setLastName(?string $lastName): self;

    /**
     * Email of the buyer.
     *
     * @param string|null $email
     * @return self
     */
    public function setEmail(?string $email): self;

    /**
     * E.164 standard.
     *
     * @param string|null $phoneNumber
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self;
}
