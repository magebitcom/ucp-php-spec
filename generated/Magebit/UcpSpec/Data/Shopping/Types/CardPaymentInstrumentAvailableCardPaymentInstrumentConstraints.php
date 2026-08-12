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

use Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Constraints on this instrument type. Structure depends on instrument type and active capabilities.
 */
class CardPaymentInstrumentAvailableCardPaymentInstrumentConstraints extends SpecObject implements CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface
{
    /**
     * @return string[]|null
     */
    public function getBrands(): array|null
    {
        return $this->arrayOrNull(self::KEY_BRANDS);
    }

    /**
     * @param string[]|null $brands
     * @return self
     */
    public function setBrands(array|null $brands): self
    {
        return $this->set(self::KEY_BRANDS, $brands);
    }
}
