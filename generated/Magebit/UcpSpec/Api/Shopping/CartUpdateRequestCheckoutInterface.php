<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemUpdateRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;

/**
 * Checkout extended with cart capability. Adds cart_id to create_checkout for cart-to-checkout conversion.
 *
 * Schema: Checkout with Cart Update Request
 */
interface CartUpdateRequestCheckoutInterface
{
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_BUYER = 'buyer';
    public const KEY_CONTEXT = 'context';
    public const KEY_SIGNALS = 'signals';
    public const KEY_ATTRIBUTION = 'attribution';
    public const KEY_PAYMENT = 'payment';

    /**
     * List of line items being checked out.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemUpdateRequestInterface[]
     */
    public function getLineItems(): array;

    /**
     * List of line items being checked out.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemUpdateRequestInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Representation of the buyer.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null;

    /**
     * Representation of the buyer.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(ContextInterface|null $context): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null
     */
    public function getSignals(): SignalsInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null $signals
     * @return self
     */
    public function setSignals(SignalsInterface|null $signals): self;

    /**
     * @return array<string, string>|null
     */
    public function getAttribution(): array|null;

    /**
     * @param array<string, string>|null $attribution
     * @return self
     */
    public function setAttribution(array|null $attribution): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null
     */
    public function getPayment(): PaymentInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null $payment
     * @return self
     */
    public function setPayment(PaymentInterface|null $payment): self;
}
