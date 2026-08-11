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

use Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestAllocationInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Breakdown of how a discount amount was allocated to a specific target.
 */
class DiscountCreateRequestAllocation extends SpecObject implements DiscountCreateRequestAllocationInterface
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->get(self::KEY_PATH);
    }

    /**
     * @param string $path
     * @return self
     */
    public function setPath(string $path): self
    {
        return $this->set(self::KEY_PATH, $path);
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->get(self::KEY_AMOUNT);
    }

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self
    {
        return $this->set(self::KEY_AMOUNT, $amount);
    }
}
