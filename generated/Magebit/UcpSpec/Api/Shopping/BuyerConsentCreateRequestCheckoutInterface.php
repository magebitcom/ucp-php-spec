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

use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface;

/**
 * Checkout extended with consent tracking via buyer object.
 *
 * Schema: Checkout with Buyer Consent Create Request
 */
interface BuyerConsentCreateRequestCheckoutInterface
{
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_BUYER = 'buyer';
    public const KEY_CONTEXT = 'context';
    public const KEY_PAYMENT = 'payment';

    /**
     * List of line items being checked out.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[]
     */
    public function getLineItems(): array;

    /**
     * List of line items being checked out.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemCreateRequestInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Buyer with consent tracking.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestBuyerInterface|null
     */
    public function getBuyer(): BuyerConsentCreateRequestBuyerInterface|null;

    /**
     * Buyer with consent tracking.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestBuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerConsentCreateRequestBuyerInterface|null $buyer): self;

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
     * @return \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null
     */
    public function getPayment(): PaymentInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\PaymentInterface|null $payment
     * @return self
     */
    public function setPayment(PaymentInterface|null $payment): self;
}
