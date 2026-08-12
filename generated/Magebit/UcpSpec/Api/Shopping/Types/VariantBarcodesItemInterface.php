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

interface VariantBarcodesItemInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_VALUE = 'value';

    /**
     * Barcode standard. Well-known values: UPC, EAN, ISBN, GTIN, JAN.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Barcode standard. Well-known values: UPC, EAN, ISBN, GTIN, JAN.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Barcode value.
     *
     * @return string
     */
    public function getValue(): string;

    /**
     * Barcode value.
     *
     * @param string $value
     * @return self
     */
    public function setValue(string $value): self;
}
