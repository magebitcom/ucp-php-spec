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
 * Quantity tracking for the line item.
 */
interface OrderLineItemQuantityInterface
{
    public const KEY_ORIGINAL = 'original';
    public const KEY_TOTAL = 'total';
    public const KEY_FULFILLED = 'fulfilled';

    /**
     * Quantity from the original checkout.
     *
     * @return int|null
     */
    public function getOriginal(): int|null;

    /**
     * Quantity from the original checkout.
     *
     * @param int|null $original
     * @return self
     */
    public function setOriginal(int|null $original): self;

    /**
     * Current total active quantity. May differ from original due to post-order modifications (e.g., returns or cancellations).
     *
     * @return int
     */
    public function getTotal(): int;

    /**
     * Current total active quantity. May differ from original due to post-order modifications (e.g., returns or cancellations).
     *
     * @param int $total
     * @return self
     */
    public function setTotal(int $total): self;

    /**
     * Quantity fulfilled so far.
     *
     * @return int
     */
    public function getFulfilled(): int;

    /**
     * Quantity fulfilled so far.
     *
     * @param int $fulfilled
     * @return self
     */
    public function setFulfilled(int $fulfilled): self;
}
