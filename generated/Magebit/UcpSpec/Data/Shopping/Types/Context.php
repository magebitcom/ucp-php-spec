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
 * Provisional buyer signals for relevance and localization: product availability, pricing, currency, tax, shipping, payment methods, and eligibility (e.g., student or affiliation discounts). Businesses SHOULD use these values when authoritative data (e.g., address) is absent, and MAY ignore unsupported values without returning errors. Context can be disclosed progressively—coarse signals early, finer resolution as the session progresses. Higher-resolution data (shipping address, billing address) supersedes context. Platforms SHOULD progressively enhance context throughout the buyer journey.
 */
class Context extends SpecObject implements ContextInterface
{
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
}
