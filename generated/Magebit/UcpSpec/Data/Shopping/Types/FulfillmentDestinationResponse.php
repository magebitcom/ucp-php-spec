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

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentDestinationResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A destination for fulfillment.
 */
class FulfillmentDestinationResponse extends SpecObject implements FulfillmentDestinationResponseInterface
{
    /**
     * @return string|null
     */
    public function getExtendedAddress(): string|null
    {
        return $this->get(self::KEY_EXTENDED_ADDRESS);
    }

    /**
     * @param string|null $extendedAddress
     * @return self
     */
    public function setExtendedAddress(string|null $extendedAddress): self
    {
        return $this->set(self::KEY_EXTENDED_ADDRESS, $extendedAddress);
    }

    /**
     * @return string|null
     */
    public function getStreetAddress(): string|null
    {
        return $this->get(self::KEY_STREET_ADDRESS);
    }

    /**
     * @param string|null $streetAddress
     * @return self
     */
    public function setStreetAddress(string|null $streetAddress): self
    {
        return $this->set(self::KEY_STREET_ADDRESS, $streetAddress);
    }

    /**
     * @return string|null
     */
    public function getAddressLocality(): string|null
    {
        return $this->get(self::KEY_ADDRESS_LOCALITY);
    }

    /**
     * @param string|null $addressLocality
     * @return self
     */
    public function setAddressLocality(string|null $addressLocality): self
    {
        return $this->set(self::KEY_ADDRESS_LOCALITY, $addressLocality);
    }

    /**
     * @return string|null
     */
    public function getAddressRegion(): string|null
    {
        return $this->get(self::KEY_ADDRESS_REGION);
    }

    /**
     * @param string|null $addressRegion
     * @return self
     */
    public function setAddressRegion(string|null $addressRegion): self
    {
        return $this->set(self::KEY_ADDRESS_REGION, $addressRegion);
    }

    /**
     * @return string|null
     */
    public function getAddressCountry(): string|null
    {
        return $this->get(self::KEY_ADDRESS_COUNTRY);
    }

    /**
     * @param string|null $addressCountry
     * @return self
     */
    public function setAddressCountry(string|null $addressCountry): self
    {
        return $this->set(self::KEY_ADDRESS_COUNTRY, $addressCountry);
    }

    /**
     * @return string|null
     */
    public function getPostalCode(): string|null
    {
        return $this->get(self::KEY_POSTAL_CODE);
    }

    /**
     * @param string|null $postalCode
     * @return self
     */
    public function setPostalCode(string|null $postalCode): self
    {
        return $this->set(self::KEY_POSTAL_CODE, $postalCode);
    }

    /**
     * @return string|null
     */
    public function getFirstName(): string|null
    {
        return $this->get(self::KEY_FIRST_NAME);
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
        return $this->get(self::KEY_LAST_NAME);
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
    public function getPhoneNumber(): string|null
    {
        return $this->get(self::KEY_PHONE_NUMBER);
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
     * @return string
     */
    public function getId(): string
    {
        return $this->get(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }
}
