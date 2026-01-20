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
 * Shipping destination.
 *
 * Schema: Shipping Destination Request
 */
interface ShippingDestinationRequestInterface
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
     * ID specific to this shipping destination.
     *
     * @return string|null
     */
    public function getId(): string|null;

    /**
     * An address extension such as an apartment number, C/O or alternative name.
     *
     * @param string|null $extended_address
     * @return self
     */
    public function setExtendedAddress(string|null $extended_address): self;

    /**
     * The street address.
     *
     * @param string|null $street_address
     * @return self
     */
    public function setStreetAddress(string|null $street_address): self;

    /**
     * The locality in which the street address is, and which is in the region. For example, Mountain View.
     *
     * @param string|null $address_locality
     * @return self
     */
    public function setAddressLocality(string|null $address_locality): self;

    /**
     * The region in which the locality is, and which is in the country. Required for applicable countries (i.e. state in US, province in CA). For example, California or another appropriate first-level Administrative division.
     *
     * @param string|null $address_region
     * @return self
     */
    public function setAddressRegion(string|null $address_region): self;

    /**
     * The country. Recommended to be in 2-letter ISO 3166-1 alpha-2 format, for example "US". For backward compatibility, a 3-letter ISO 3166-1 alpha-3 country code such as "SGP" or a full country name such as "Singapore" can also be used.
     *
     * @param string|null $address_country
     * @return self
     */
    public function setAddressCountry(string|null $address_country): self;

    /**
     * The postal code. For example, 94043.
     *
     * @param string|null $postal_code
     * @return self
     */
    public function setPostalCode(string|null $postal_code): self;

    /**
     * Optional. First name of the contact associated with the address.
     *
     * @param string|null $first_name
     * @return self
     */
    public function setFirstName(string|null $first_name): self;

    /**
     * Optional. Last name of the contact associated with the address.
     *
     * @param string|null $last_name
     * @return self
     */
    public function setLastName(string|null $last_name): self;

    /**
     * Optional. Full name of the contact associated with the address (if first_name or last_name fields are present they take precedence).
     *
     * @param string|null $full_name
     * @return self
     */
    public function setFullName(string|null $full_name): self;

    /**
     * Optional. Phone number of the contact associated with the address.
     *
     * @param string|null $phone_number
     * @return self
     */
    public function setPhoneNumber(string|null $phone_number): self;

    /**
     * ID specific to this shipping destination.
     *
     * @param string|null $id
     * @return self
     */
    public function setId(string|null $id): self;
}
