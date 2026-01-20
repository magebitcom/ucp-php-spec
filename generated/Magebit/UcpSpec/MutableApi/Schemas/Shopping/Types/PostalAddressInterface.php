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
 * Schema: Postal Address
 */
interface PostalAddressInterface
{
    /**
     * An address extension such as an apartment number, C/O or alternative name.
     *
     * @return string|null
     */
    public function getExtendedAddress(): string|null;

    /**
     * The street address.
     *
     * @return string|null
     */
    public function getStreetAddress(): string|null;

    /**
     * The locality in which the street address is, and which is in the region. For example, Mountain View.
     *
     * @return string|null
     */
    public function getAddressLocality(): string|null;

    /**
     * The region in which the locality is, and which is in the country. Required for applicable countries (i.e. state in US, province in CA). For example, California or another appropriate first-level Administrative division.
     *
     * @return string|null
     */
    public function getAddressRegion(): string|null;

    /**
     * The country. Recommended to be in 2-letter ISO 3166-1 alpha-2 format, for example "US". For backward compatibility, a 3-letter ISO 3166-1 alpha-3 country code such as "SGP" or a full country name such as "Singapore" can also be used.
     *
     * @return string|null
     */
    public function getAddressCountry(): string|null;

    /**
     * The postal code. For example, 94043.
     *
     * @return string|null
     */
    public function getPostalCode(): string|null;

    /**
     * Optional. First name of the contact associated with the address.
     *
     * @return string|null
     */
    public function getFirstName(): string|null;

    /**
     * Optional. Last name of the contact associated with the address.
     *
     * @return string|null
     */
    public function getLastName(): string|null;

    /**
     * Optional. Full name of the contact associated with the address (if first_name or last_name fields are present they take precedence).
     *
     * @return string|null
     */
    public function getFullName(): string|null;

    /**
     * Optional. Phone number of the contact associated with the address.
     *
     * @return string|null
     */
    public function getPhoneNumber(): string|null;

    /**
     * An address extension such as an apartment number, C/O or alternative name.
     *
     * @param string|null $extendedAddress
     * @return self
     */
    public function setExtendedAddress(?string $extendedAddress): self;

    /**
     * The street address.
     *
     * @param string|null $streetAddress
     * @return self
     */
    public function setStreetAddress(?string $streetAddress): self;

    /**
     * The locality in which the street address is, and which is in the region. For example, Mountain View.
     *
     * @param string|null $addressLocality
     * @return self
     */
    public function setAddressLocality(?string $addressLocality): self;

    /**
     * The region in which the locality is, and which is in the country. Required for applicable countries (i.e. state in US, province in CA). For example, California or another appropriate first-level Administrative division.
     *
     * @param string|null $addressRegion
     * @return self
     */
    public function setAddressRegion(?string $addressRegion): self;

    /**
     * The country. Recommended to be in 2-letter ISO 3166-1 alpha-2 format, for example "US". For backward compatibility, a 3-letter ISO 3166-1 alpha-3 country code such as "SGP" or a full country name such as "Singapore" can also be used.
     *
     * @param string|null $addressCountry
     * @return self
     */
    public function setAddressCountry(?string $addressCountry): self;

    /**
     * The postal code. For example, 94043.
     *
     * @param string|null $postalCode
     * @return self
     */
    public function setPostalCode(?string $postalCode): self;

    /**
     * Optional. First name of the contact associated with the address.
     *
     * @param string|null $firstName
     * @return self
     */
    public function setFirstName(?string $firstName): self;

    /**
     * Optional. Last name of the contact associated with the address.
     *
     * @param string|null $lastName
     * @return self
     */
    public function setLastName(?string $lastName): self;

    /**
     * Optional. Full name of the contact associated with the address (if first_name or last_name fields are present they take precedence).
     *
     * @param string|null $fullName
     * @return self
     */
    public function setFullName(?string $fullName): self;

    /**
     * Optional. Phone number of the contact associated with the address.
     *
     * @param string|null $phoneNumber
     * @return self
     */
    public function setPhoneNumber(?string $phoneNumber): self;
}
