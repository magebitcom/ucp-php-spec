<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * Provisional buyer signals for relevance and localization—not authoritative data. Businesses SHOULD use these values when verified inputs (e.g., shipping address) are absent, and MAY ignore or down-rank them if inconsistent with higher-confidence signals (authenticated account, risk detection) or regulatory constraints (export controls). Eligibility and policy enforcement MUST occur at checkout time using binding transaction data. Context SHOULD be non-identifying and can be disclosed progressively—coarse signals early, finer resolution as the session progresses. Higher-resolution data (shipping address, billing address) supersedes context.
 *
 * Schema: Context
 */
interface ContextInterface
{
    public const KEY_ADDRESS_COUNTRY = 'address_country';
    public const KEY_ADDRESS_REGION = 'address_region';
    public const KEY_POSTAL_CODE = 'postal_code';
    public const KEY_INTENT = 'intent';
    public const KEY_LANGUAGE = 'language';
    public const KEY_CURRENCY = 'currency';
    public const KEY_ELIGIBILITY = 'eligibility';
    public const CONSTRAINTS = ['eligibility' => ['items' => ['pattern' => '^[a-z][a-z0-9]*(?:\.[a-z][a-z0-9_]*)+$']]];

    /**
     * The country. Recommended to be in 2-letter ISO 3166-1 alpha-2 format, for example "US". For backward compatibility, a 3-letter ISO 3166-1 alpha-3 country code such as "SGP" or a full country name such as "Singapore" can also be used. Optional hint for market context (currency, availability, pricing)—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @return string|null
     */
    public function getAddressCountry(): string|null;

    /**
     * The country. Recommended to be in 2-letter ISO 3166-1 alpha-2 format, for example "US". For backward compatibility, a 3-letter ISO 3166-1 alpha-3 country code such as "SGP" or a full country name such as "Singapore" can also be used. Optional hint for market context (currency, availability, pricing)—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @param string|null $addressCountry
     * @return self
     */
    public function setAddressCountry(string|null $addressCountry): self;

    /**
     * The region in which the locality is, and which is in the country. For example, California or another appropriate first-level Administrative division. Optional hint for progressive localization—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @return string|null
     */
    public function getAddressRegion(): string|null;

    /**
     * The region in which the locality is, and which is in the country. For example, California or another appropriate first-level Administrative division. Optional hint for progressive localization—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @param string|null $addressRegion
     * @return self
     */
    public function setAddressRegion(string|null $addressRegion): self;

    /**
     * The postal code. For example, 94043. Optional hint for regional refinement—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @return string|null
     */
    public function getPostalCode(): string|null;

    /**
     * The postal code. For example, 94043. Optional hint for regional refinement—higher-resolution data (e.g., shipping address) supersedes this value.
     *
     * @param string|null $postalCode
     * @return self
     */
    public function setPostalCode(string|null $postalCode): self;

    /**
     * Background context describing buyer's intent (e.g., 'looking for a gift under $50', 'need something durable for outdoor use'). Informs relevance, recommendations, and personalization.
     *
     * @return string|null
     */
    public function getIntent(): string|null;

    /**
     * Background context describing buyer's intent (e.g., 'looking for a gift under $50', 'need something durable for outdoor use'). Informs relevance, recommendations, and personalization.
     *
     * @param string|null $intent
     * @return self
     */
    public function setIntent(string|null $intent): self;

    /**
     * Preferred language for content. Use IETF BCP 47 language tags (e.g., 'en', 'fr-CA', 'zh-Hans'). For REST, equivalent to Accept-Language header—platforms SHOULD fall back to Accept-Language when this field is absent; when provided, overrides Accept-Language. Businesses MAY return content in a different language if unavailable.
     *
     * @return string|null
     */
    public function getLanguage(): string|null;

    /**
     * Preferred language for content. Use IETF BCP 47 language tags (e.g., 'en', 'fr-CA', 'zh-Hans'). For REST, equivalent to Accept-Language header—platforms SHOULD fall back to Accept-Language when this field is absent; when provided, overrides Accept-Language. Businesses MAY return content in a different language if unavailable.
     *
     * @param string|null $language
     * @return self
     */
    public function setLanguage(string|null $language): self;

    /**
     * Preferred currency (ISO 4217, e.g., 'EUR', 'USD'). Businesses determine presentment currency from context and authoritative signals; this hint MAY inform selection in multi-currency markets. Also serves as the denomination for price filter values — platforms SHOULD include this field when sending price filters. Response prices include explicit currency confirming the resolution.
     *
     * @return string|null
     */
    public function getCurrency(): string|null;

    /**
     * Preferred currency (ISO 4217, e.g., 'EUR', 'USD'). Businesses determine presentment currency from context and authoritative signals; this hint MAY inform selection in multi-currency markets. Also serves as the denomination for price filter values — platforms SHOULD include this field when sending price filters. Response prices include explicit currency confirming the resolution.
     *
     * @param string|null $currency
     * @return self
     */
    public function setCurrency(string|null $currency): self;

    /**
     * Buyer claims about eligible benefits such as loyalty membership, payment instrument perks, and similar. Recognized claims MAY inform the Business response (e.g., member-only product availability, adjusted pricing in catalog, provisional discounts at cart or checkout). Businesses MUST ignore unrecognized values without error. Values MUST use reverse-domain naming (e.g., 'com.example.loyalty_gold', 'org.school.student') and MUST be non-identifying.
     *
     * @return string[]|null
     */
    public function getEligibility(): array|null;

    /**
     * Buyer claims about eligible benefits such as loyalty membership, payment instrument perks, and similar. Recognized claims MAY inform the Business response (e.g., member-only product availability, adjusted pricing in catalog, provisional discounts at cart or checkout). Businesses MUST ignore unrecognized values without error. Values MUST use reverse-domain naming (e.g., 'com.example.loyalty_gold', 'org.school.student') and MUST be non-identifying.
     *
     * @param string[]|null $eligibility
     * @return self
     */
    public function setEligibility(array|null $eligibility): self;
}
