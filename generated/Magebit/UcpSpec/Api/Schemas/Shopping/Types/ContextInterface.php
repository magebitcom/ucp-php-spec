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
 * Provisional buyer signals for relevance and localization: product availability, pricing, currency, tax, shipping, payment methods, and eligibility (e.g., student or affiliation discounts). Businesses SHOULD use these values when authoritative data (e.g., address) is absent, and MAY ignore unsupported values without returning errors. Context can be disclosed progressively—coarse signals early, finer resolution as the session progresses. Higher-resolution data (shipping address, billing address) supersedes context. Platforms SHOULD progressively enhance context throughout the buyer journey.
 *
 * Schema: Context
 */
interface ContextInterface
{
    public const KEY_ADDRESS_COUNTRY = 'address_country';
    public const KEY_ADDRESS_REGION = 'address_region';
    public const KEY_POSTAL_CODE = 'postal_code';

    /**
     * The country. Recommended to be in 2-letter ISO 3166-1 alpha-2 format, for example "US". For backward compatibility, a 3-letter ISO 3166-1 alpha-3 country code such as "SGP" or a full country name such as "Singapore" can also be used. Optional hint for market context (currency, availability, pricing)—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @return string|null
     */
    public function getAddressCountry(): string|null;

    /**
     * The region in which the locality is, and which is in the country. For example, California or another appropriate first-level Administrative division. Optional hint for progressive localization—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @return string|null
     */
    public function getAddressRegion(): string|null;

    /**
     * The postal code. For example, 94043. Optional hint for regional refinement—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @return string|null
     */
    public function getPostalCode(): string|null;
}
