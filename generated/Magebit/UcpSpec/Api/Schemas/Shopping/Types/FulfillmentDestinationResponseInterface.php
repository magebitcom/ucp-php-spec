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
 * A destination for fulfillment.
 *
 * Schema: Fulfillment Destination Response
 */
interface FulfillmentDestinationResponseInterface
{
    public const KEY_EXTENDED_ADDRESS = 'extended_address';
    public const KEY_STREET_ADDRESS = 'street_address';
    public const KEY_ADDRESS_LOCALITY = 'address_locality';
    public const KEY_ADDRESS_REGION = 'address_region';
    public const KEY_ADDRESS_COUNTRY = 'address_country';
    public const KEY_POSTAL_CODE = 'postal_code';
    public const KEY_FIRST_NAME = 'first_name';
    public const KEY_LAST_NAME = 'last_name';
    public const KEY_PHONE_NUMBER = 'phone_number';
    public const KEY_ID = 'id';

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
     * Optional. Phone number of the contact associated with the address.
     *
     * @return string|null
     */
    public function getPhoneNumber(): string|null;

    /**
     * ID specific to this shipping destination.
     *
     * @return string
     */
    public function getId(): string;
}
