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
 * Variant availability for purchase.
 */
interface VariantAvailabilityInterface
{
    public const KEY_AVAILABLE = 'available';
    public const KEY_STATUS = 'status';

    /**
     * Whether this variant can be purchased. See status for fulfillment details.
     *
     * @return bool|null
     */
    public function getAvailable(): bool|null;

    /**
     * Whether this variant can be purchased. See status for fulfillment details.
     *
     * @param bool|null $available
     * @return self
     */
    public function setAvailable(bool|null $available): self;

    /**
     * Qualifies available with fulfillment state. Well-known values: `in_stock`, `backorder`, `preorder`, `out_of_stock`, `discontinued`.
     *
     * @return string|null
     */
    public function getStatus(): string|null;

    /**
     * Qualifies available with fulfillment state. Well-known values: `in_stock`, `backorder`, `preorder`, `out_of_stock`, `discontinued`.
     *
     * @param string|null $status
     * @return self
     */
    public function setStatus(string|null $status): self;
}
