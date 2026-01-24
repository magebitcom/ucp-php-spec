<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LineItemCreateRequestInterface;

/**
 * Base checkout schema. Extensions compose onto this using allOf.
 *
 * Schema: Checkout Create Request
 */
interface CheckoutCreateRequestInterface
{
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_BUYER = 'buyer';
    public const KEY_CONTEXT = 'context';
    public const KEY_PAYMENT = 'payment';

    /**
     * List of line items being checked out.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LineItemCreateRequestInterface[]
     */
    public function getLineItems(): array;

    /**
     * Representation of the buyer.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null;

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null;

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentInterface|null
     */
    public function getPayment(): PaymentInterface|null;

    /**
     * List of line items being checked out.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\LineItemCreateRequestInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Representation of the buyer.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(?BuyerInterface $buyer): self;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(?ContextInterface $context): self;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\Shopping\PaymentInterface|null $payment
     * @return self
     */
    public function setPayment(?PaymentInterface $payment): self;
}
