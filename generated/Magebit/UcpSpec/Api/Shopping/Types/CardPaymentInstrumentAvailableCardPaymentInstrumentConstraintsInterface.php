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
 * Constraints on this instrument type. Structure depends on instrument type and active capabilities.
 */
interface CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface
{
    public const KEY_BRANDS = 'brands';

    /**
     * Limit to specific card brands (e.g., ['visa', 'mastercard', 'amex']).
     *
     * @return string[]|null
     */
    public function getBrands(): array|null;

    /**
     * Limit to specific card brands (e.g., ['visa', 'mastercard', 'amex']).
     *
     * @param string[]|null $brands
     * @return self
     */
    public function setBrands(array|null $brands): self;
}
