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

use Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceMeasureInterface;
use Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceReferenceInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Price per standard unit of measurement. MAY be omitted when unit pricing does not apply.
 */
class VariantUnitPrice extends SpecObject implements VariantUnitPriceInterface
{
    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->requireInt(self::KEY_AMOUNT);
    }

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self
    {
        return $this->set(self::KEY_AMOUNT, $amount);
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->requireString(self::KEY_CURRENCY);
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        return $this->set(self::KEY_CURRENCY, $currency);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceMeasureInterface
     */
    public function getMeasure(): VariantUnitPriceMeasureInterface
    {
        return $this->requireInstance(self::KEY_MEASURE, \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceMeasureInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceMeasureInterface $measure
     * @return self
     */
    public function setMeasure(VariantUnitPriceMeasureInterface $measure): self
    {
        return $this->set(self::KEY_MEASURE, $measure);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceReferenceInterface
     */
    public function getReference(): VariantUnitPriceReferenceInterface
    {
        return $this->requireInstance(self::KEY_REFERENCE, \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceReferenceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\VariantUnitPriceReferenceInterface $reference
     * @return self
     */
    public function setReference(VariantUnitPriceReferenceInterface $reference): self
    {
        return $this->set(self::KEY_REFERENCE, $reference);
    }
}
