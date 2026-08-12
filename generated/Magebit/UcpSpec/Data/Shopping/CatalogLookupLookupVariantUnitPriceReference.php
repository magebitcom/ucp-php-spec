<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceReferenceInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Denominator for unit price display (e.g., per 100ml, per 1kg).
 */
class CatalogLookupLookupVariantUnitPriceReference extends SpecObject implements CatalogLookupLookupVariantUnitPriceReferenceInterface
{
    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->requireInt(self::KEY_VALUE);
    }

    /**
     * @param int $value
     * @return self
     */
    public function setValue(int $value): self
    {
        return $this->set(self::KEY_VALUE, $value);
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->requireString(self::KEY_UNIT);
    }

    /**
     * @param string $unit
     * @return self
     */
    public function setUnit(string $unit): self
    {
        return $this->set(self::KEY_UNIT, $unit);
    }
}
