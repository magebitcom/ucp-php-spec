<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

/**
 * Price per standard unit of measurement. MAY be omitted when unit pricing does not apply.
 */
interface CatalogLookupLookupVariantUnitPriceInterface
{
    public const KEY_AMOUNT = 'amount';
    public const KEY_CURRENCY = 'currency';
    public const KEY_MEASURE = 'measure';
    public const KEY_REFERENCE = 'reference';
    public const CONSTRAINTS = ['currency' => ['pattern' => '^[A-Z]{3}$']];

    /**
     * Unit price in ISO 4217 minor units. Business MUST return precomputed unit price value: (variant.price / measure.value) * reference.value.
     *
     * @return mixed
     */
    public function getAmount();

    /**
     * Unit price in ISO 4217 minor units. Business MUST return precomputed unit price value: (variant.price / measure.value) * reference.value.
     *
     * @param mixed $amount
     * @return self
     */
    public function setAmount($amount): self;

    /**
     * ISO 4217 currency code.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * ISO 4217 currency code.
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self;

    /**
     * Product quantity in packaging (e.g., 750ml bottle).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceMeasureInterface
     */
    public function getMeasure(): CatalogLookupLookupVariantUnitPriceMeasureInterface;

    /**
     * Product quantity in packaging (e.g., 750ml bottle).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceMeasureInterface $measure
     * @return self
     */
    public function setMeasure(CatalogLookupLookupVariantUnitPriceMeasureInterface $measure): self;

    /**
     * Denominator for unit price display (e.g., per 100ml, per 1kg).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceReferenceInterface
     */
    public function getReference(): CatalogLookupLookupVariantUnitPriceReferenceInterface;

    /**
     * Denominator for unit price display (e.g., per 100ml, per 1kg).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupLookupVariantUnitPriceReferenceInterface $reference
     * @return self
     */
    public function setReference(CatalogLookupLookupVariantUnitPriceReferenceInterface $reference): self;
}
