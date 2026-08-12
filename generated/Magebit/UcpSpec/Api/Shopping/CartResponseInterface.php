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
use Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalsResponseInterface;
use Magebit\UcpSpec\Api\UcpResponseCartSchemaInterface;

/**
 * Shopping cart with estimated pricing before checkout. Lightweight pre-purchase exploration with no payment info or complex status states.
 *
 * Schema: Cart Response
 */
interface CartResponseInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_ID = 'id';
    public const KEY_LINE_ITEMS = 'line_items';
    public const KEY_CONTEXT = 'context';
    public const KEY_SIGNALS = 'signals';
    public const KEY_ATTRIBUTION = 'attribution';
    public const KEY_BUYER = 'buyer';
    public const KEY_CURRENCY = 'currency';
    public const KEY_TOTALS = 'totals';
    public const KEY_MESSAGES = 'messages';
    public const KEY_LINKS = 'links';
    public const KEY_CONTINUE_URL = 'continue_url';
    public const KEY_EXPIRES_AT = 'expires_at';

    /**
     * @return \Magebit\UcpSpec\Api\UcpResponseCartSchemaInterface
     */
    public function getUcp(): UcpResponseCartSchemaInterface;

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseCartSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseCartSchemaInterface $ucp): self;

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[]
     */
    public function getLineItems(): array;

    /**
     * Cart line items. Same structure as checkout. Full replacement on update.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[] $lineItems
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

    /**
     * ISO 4217 currency code. Determined by merchant based on context or geo-IP.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * ISO 4217 currency code. Determined by merchant based on context or geo-IP.
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self;

    /**
     * Estimated cost breakdown. May be partial if shipping/tax not yet calculable.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): TotalsResponseInterface;

    /**
     * Estimated cost breakdown. May be partial if shipping/tax not yet calculable.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(TotalsResponseInterface $totals): self;

    /**
     * Validation messages, warnings, or informational notices.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Validation messages, warnings, or informational notices.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self;

    /**
     * Optional merchant links (policies, FAQs).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null
     */
    public function getLinks(): array|null;

    /**
     * Optional merchant links (policies, FAQs).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null $links
     * @return self
     */
    public function setLinks(array|null $links): self;

    /**
     * URL for cart handoff and session recovery. Enables sharing and human-in-the-loop flows.
     *
     * @return string|null
     */
    public function getContinueUrl(): string|null;

    /**
     * URL for cart handoff and session recovery. Enables sharing and human-in-the-loop flows.
     *
     * @param string|null $continueUrl
     * @return self
     */
    public function setContinueUrl(string|null $continueUrl): self;

    /**
     * Cart expiry timestamp (RFC 3339). Optional.
     *
     * @return string|null
     */
    public function getExpiresAt(): string|null;

    /**
     * Cart expiry timestamp (RFC 3339). Optional.
     *
     * @param string|null $expiresAt
     * @return self
     */
    public function setExpiresAt(string|null $expiresAt): self;
}
