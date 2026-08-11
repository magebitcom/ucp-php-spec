<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestBuyerInterface;
use Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestConsentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Buyer object extended with consent tracking.
 */
class BuyerConsentCreateRequestBuyer extends SpecObject implements BuyerConsentCreateRequestBuyerInterface
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

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestConsentInterface|null
     */
    public function getConsent(): BuyerConsentCreateRequestConsentInterface|null
    {
        return $this->instanceOrNull(self::KEY_CONSENT, \Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestConsentInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestConsentInterface|null $consent
     * @return self
     */
    public function setConsent(BuyerConsentCreateRequestConsentInterface|null $consent): self
    {
        return $this->set(self::KEY_CONSENT, $consent);
    }
}
