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

use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Provisional buyer signals for relevance and localization—not authoritative data. Businesses SHOULD use these values when verified inputs (e.g., shipping address) are absent, and MAY ignore or down-rank them if inconsistent with higher-confidence signals (authenticated account, risk detection) or regulatory constraints (export controls). Eligibility and policy enforcement MUST occur at checkout time using binding transaction data. Context SHOULD be non-identifying and can be disclosed progressively—coarse signals early, finer resolution as the session progresses. Higher-resolution data (shipping address, billing address) supersedes context.
 */
class Context extends SpecObject implements ContextInterface
{
    /**
     * @return string|null
     */
    public function getAddressCountry(): string|null
    {
        return $this->stringOrNull(self::KEY_ADDRESS_COUNTRY);
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
    public function getAddressRegion(): string|null
    {
        return $this->stringOrNull(self::KEY_ADDRESS_REGION);
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
    public function getPostalCode(): string|null
    {
        return $this->stringOrNull(self::KEY_POSTAL_CODE);
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
    public function getIntent(): string|null
    {
        return $this->stringOrNull(self::KEY_INTENT);
    }

    /**
     * @param string|null $intent
     * @return self
     */
    public function setIntent(string|null $intent): self
    {
        return $this->set(self::KEY_INTENT, $intent);
    }

    /**
     * @return string|null
     */
    public function getLanguage(): string|null
    {
        return $this->stringOrNull(self::KEY_LANGUAGE);
    }

    /**
     * @param string|null $language
     * @return self
     */
    public function setLanguage(string|null $language): self
    {
        return $this->set(self::KEY_LANGUAGE, $language);
    }

    /**
     * @return string|null
     */
    public function getCurrency(): string|null
    {
        return $this->stringOrNull(self::KEY_CURRENCY);
    }

    /**
     * @param string|null $currency
     * @return self
     */
    public function setCurrency(string|null $currency): self
    {
        return $this->set(self::KEY_CURRENCY, $currency);
    }

    /**
     * @return string[]|null
     */
    public function getEligibility(): array|null
    {
        return $this->arrayOrNull(self::KEY_ELIGIBILITY);
    }

    /**
     * @param string[]|null $eligibility
     * @return self
     */
    public function setEligibility(array|null $eligibility): self
    {
        return $this->set(self::KEY_ELIGIBILITY, $eligibility);
    }
}
