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
 * Shopping cart with estimated pricing before checkout. Lightweight pre-purchase exploration with no payment info or complex status states.
 *
 * Schema: Cart Update Request
 */
interface CartUpdateRequestInterface
{
    public const KEY_ID = 'id';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_CONTEXT = 'context';
    public const KEY_SIGNALS = 'signals';
    public const KEY_ATTRIBUTION = 'attribution';
    public const KEY_BUYER = 'buyer';

    /**
     * Unique cart identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Unique cart identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Cart line items. Same structure as checkout. Full replacement on update.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemUpdateRequestInterface[]
     */
    public function getLineItems(): array;

    /**
     * Cart line items. Same structure as checkout. Full replacement on update.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemUpdateRequestInterface[] $lineItems
     * @return self
     */
    public function setLineItems(array $lineItems): self;

    /**
     * Buyer signals for localization (country, region, postal_code). Merchant uses for pricing, availability, currency. Falls back to geo-IP if omitted.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null;

    /**
     * Buyer signals for localization (country, region, postal_code). Merchant uses for pricing, availability, currency. Falls back to geo-IP if omitted.
     *
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
     * Optional buyer information for personalized estimates.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null
     */
    public function getBuyer(): BuyerInterface|null;

    /**
     * Optional buyer information for personalized estimates.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface|null $buyer
     * @return self
     */
    public function setBuyer(BuyerInterface|null $buyer): self;
}
