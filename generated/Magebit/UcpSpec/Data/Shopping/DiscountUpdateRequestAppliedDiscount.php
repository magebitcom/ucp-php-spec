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

use Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestAllocationInterface;
use Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestAppliedDiscountInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A discount that was successfully applied.
 */
class DiscountUpdateRequestAppliedDiscount extends SpecObject implements DiscountUpdateRequestAppliedDiscountInterface
{
    /**
     * @return string|null
     */
    public function getCode(): string|null
    {
        return $this->get(self::KEY_CODE);
    }

    /**
     * @param string|null $code
     * @return self
     */
    public function setCode(string|null $code): self
    {
        return $this->set(self::KEY_CODE, $code);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->get(self::KEY_TITLE);
    }

    /**
     * @param string $title
     * @return self
     */
    public function setTitle(string $title): self
    {
        return $this->set(self::KEY_TITLE, $title);
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

    /**
     * @return bool|null
     */
    public function getAutomatic(): bool|null
    {
        return $this->get(self::KEY_AUTOMATIC);
    }

    /**
     * @param bool|null $automatic
     * @return self
     */
    public function setAutomatic(bool|null $automatic): self
    {
        return $this->set(self::KEY_AUTOMATIC, $automatic);
    }

    /**
     * @return string|null
     */
    public function getMethod(): string|null
    {
        return $this->get(self::KEY_METHOD);
    }

    /**
     * @param string|null $method
     * @return self
     */
    public function setMethod(string|null $method): self
    {
        return $this->set(self::KEY_METHOD, $method);
    }

    /**
     * @return int|null
     */
    public function getPriority(): int|null
    {
        return $this->get(self::KEY_PRIORITY);
    }

    /**
     * @param int|null $priority
     * @return self
     */
    public function setPriority(int|null $priority): self
    {
        return $this->set(self::KEY_PRIORITY, $priority);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestAllocationInterface[]|null
     */
    public function getAllocations(): array|null
    {
        return $this->get(self::KEY_ALLOCATIONS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountUpdateRequestAllocationInterface[]|null $allocations
     * @return self
     */
    public function setAllocations(array|null $allocations): self
    {
        return $this->set(self::KEY_ALLOCATIONS, $allocations);
    }
}
