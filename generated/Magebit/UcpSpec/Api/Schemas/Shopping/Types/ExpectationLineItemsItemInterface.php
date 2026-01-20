<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

interface ExpectationLineItemsItemInterface
{
    /**
     * Line item ID reference.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Quantity of this item in this expectation.
     *
     * @return int
     */
    public function getQuantity(): int;
}
