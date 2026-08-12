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

use Magebit\UcpSpec\Api\Shopping\DiscountCompleteRequestCartInterface;
use Magebit\UcpSpec\Api\Shopping\DiscountCompleteRequestDiscountsObjectInterface;
use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemCompleteRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Cart extended with discount capability.
 */
class DiscountCompleteRequestCart extends SpecObject implements DiscountCompleteRequestCartInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->requireString(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemCompleteRequestInterface[]
     */
    public function getLineItems(): array
    {
        return $this->instanceList(self::KEY_LINE_ITEMS, \Magebit\UcpSpec\Api\Shopping\Types\LineItemCompleteRequestInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemCompleteRequestInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self
    {
        return $this->set(self::KEY_LINE_ITEMS, $lineItems);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null
    {
        return $this->instanceOrNull(self::KEY_CONTEXT, \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(ContextInterface|null $context): self
    {
        return $this->set(self::KEY_CONTEXT, $context);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null
     */
    public function getSignals(): SignalsInterface|null
    {
        return $this->instanceOrNull(self::KEY_SIGNALS, \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null $signals
     * @return self
     */
    public function setSignals(SignalsInterface|null $signals): self
    {
        return $this->set(self::KEY_SIGNALS, $signals);
    }

    /**
     * @return array<string, string>|null
     */
    public function getAttribution(): array|null
    {
        return $this->arrayOrNull(self::KEY_ATTRIBUTION);
    }

    /**
     * @param array<string, string>|null $attribution
     * @return self
     */
    public function setAttribution(array|null $attribution): self
    {
        return $this->set(self::KEY_ATTRIBUTION, $attribution);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null
    {
        return $this->instanceOrNull(self::KEY_BUYER, \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self
    {
        return $this->set(self::KEY_BUYER, $buyer);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\DiscountCompleteRequestDiscountsObjectInterface|null
     */
    public function getDiscounts(): DiscountCompleteRequestDiscountsObjectInterface|null
    {
        return $this->instanceOrNull(self::KEY_DISCOUNTS, \Magebit\UcpSpec\Api\Shopping\DiscountCompleteRequestDiscountsObjectInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\DiscountCompleteRequestDiscountsObjectInterface|null $discounts
     * @return self
     */
    public function setDiscounts(DiscountCompleteRequestDiscountsObjectInterface|null $discounts): self
    {
        return $this->set(self::KEY_DISCOUNTS, $discounts);
    }
}
