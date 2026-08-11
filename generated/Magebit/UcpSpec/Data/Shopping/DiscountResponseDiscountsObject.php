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

use Magebit\UcpSpec\Api\Shopping\DiscountResponseAppliedDiscountInterface;
use Magebit\UcpSpec\Api\Shopping\DiscountResponseDiscountsObjectInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Discount codes input and applied discounts output.
 */
class DiscountResponseDiscountsObject extends SpecObject implements DiscountResponseDiscountsObjectInterface
{
    /**
     * @return string[]|null
     */
    public function getCodes(): array|null
    {
        return $this->get(self::KEY_CODES);
    }

    /**
     * @param string[]|null $codes
     * @return self
     */
    public function setCodes(array|null $codes): self
    {
        return $this->set(self::KEY_CODES, $codes);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountResponseAppliedDiscountInterface[]|null
     */
    public function getApplied(): array|null
    {
        return $this->get(self::KEY_APPLIED);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountResponseAppliedDiscountInterface[]|null $applied
     * @return self
     */
    public function setApplied(array|null $applied): self
    {
        return $this->set(self::KEY_APPLIED, $applied);
    }
}
