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

use Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestAppliedDiscountInterface;
use Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestDiscountsObjectInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Discount codes input and applied discounts output.
 */
class DiscountCreateRequestDiscountsObject extends SpecObject implements DiscountCreateRequestDiscountsObjectInterface
{
    /**
     * @return string[]|null
     */
    public function getCodes(): array|null
    {
        return $this->arrayOrNull(self::KEY_CODES);
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
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestAppliedDiscountInterface[]|null
     */
    public function getApplied(): array|null
    {
        return $this->instanceListOrNull(self::KEY_APPLIED, \Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestAppliedDiscountInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountCreateRequestAppliedDiscountInterface[]|null $applied
     * @return self
     */
    public function setApplied(array|null $applied): self
    {
        return $this->set(self::KEY_APPLIED, $applied);
    }
}
