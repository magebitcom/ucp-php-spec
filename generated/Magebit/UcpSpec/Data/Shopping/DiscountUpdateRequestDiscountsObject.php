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

use Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestAppliedDiscountInterface;
use Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestDiscountsObjectInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Discount codes input and applied discounts output.
 */
class DiscountUpdateRequestDiscountsObject extends SpecObject implements DiscountUpdateRequestDiscountsObjectInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestAppliedDiscountInterface[]|null
     */
    public function getApplied(): array|null
    {
        return $this->get(self::KEY_APPLIED);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestAppliedDiscountInterface[]|null $applied
     * @return self
     */
    public function setApplied(array|null $applied): self
    {
        return $this->set(self::KEY_APPLIED, $applied);
    }
}
