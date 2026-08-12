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

use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceInterface;
use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceMeasureInterface;
use Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceReferenceInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Price per standard unit of measurement. MAY be omitted when unit pricing does not apply.
 */
class CatalogLookupLookupVariantUnitPrice extends SpecObject implements CatalogLookupLookupVariantUnitPriceInterface
{
    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->get(self::KEY_AMOUNT);
    }

    /**
     * @param mixed $amount
     * @return self
     */
    public function setAmount($amount): self
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
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceMeasureInterface
     */
    public function getMeasure(): CatalogLookupLookupVariantUnitPriceMeasureInterface
    {
        return $this->requireInstance(self::KEY_MEASURE, \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceMeasureInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceMeasureInterface $measure
     * @return self
     */
    public function setMeasure(CatalogLookupLookupVariantUnitPriceMeasureInterface $measure): self
    {
        return $this->set(self::KEY_MEASURE, $measure);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceReferenceInterface
     */
    public function getReference(): CatalogLookupLookupVariantUnitPriceReferenceInterface
    {
        return $this->requireInstance(self::KEY_REFERENCE, \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceReferenceInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceReferenceInterface $reference
     * @return self
     */
    public function setReference(CatalogLookupLookupVariantUnitPriceReferenceInterface $reference): self
    {
        return $this->set(self::KEY_REFERENCE, $reference);
    }
}
