<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class Buyer extends SpecObject implements BuyerInterface
{
    /**
     * @return string|null
     */
    public function getFirstName(): string|null
    {
        return $this->stringOrNull(self::KEY_FIRST_NAME);
    }

    /**
     * @param string|null $firstName
     * @return self
     */
    public function setFirstName(string|null $firstName): self
    {
        return $this->set(self::KEY_FIRST_NAME, $firstName);
    }

    /**
     * @return string|null
     */
    public function getLastName(): string|null
    {
        return $this->stringOrNull(self::KEY_LAST_NAME);
    }

    /**
     * @param string|null $lastName
     * @return self
     */
    public function setLastName(string|null $lastName): self
    {
        return $this->set(self::KEY_LAST_NAME, $lastName);
    }

    /**
     * @return string|null
     */
    public function getEmail(): string|null
    {
        return $this->stringOrNull(self::KEY_EMAIL);
    }

    /**
     * @param string|null $email
     * @return self
     */
    public function setEmail(string|null $email): self
    {
        return $this->set(self::KEY_EMAIL, $email);
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): string|null
    {
        return $this->stringOrNull(self::KEY_PHONE_NUMBER);
    }

    /**
     * @param string|null $phoneNumber
     * @return self
     */
    public function setPhoneNumber(string|null $phoneNumber): self
    {
        return $this->set(self::KEY_PHONE_NUMBER, $phoneNumber);
    }
}
