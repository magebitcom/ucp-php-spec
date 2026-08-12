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

use Magebit\UcpSpec\Api\Shopping\CartResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\BuyerInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\TotalsResponseInterface;
use Magebit\UcpSpec\Api\UcpResponseCartSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Shopping cart with estimated pricing before checkout. Lightweight pre-purchase exploration with no payment info or complex status states.
 */
class CartResponse extends SpecObject implements CartResponseInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpResponseCartSchemaInterface
     */
    public function getUcp(): UcpResponseCartSchemaInterface
    {
        return $this->requireInstance(self::KEY_UCP, \Magebit\UcpSpec\Api\UcpResponseCartSchemaInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseCartSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseCartSchemaInterface $ucp): self
    {
        return $this->set(self::KEY_UCP, $ucp);
    }

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
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[]
     */
    public function getLineItems(): array
    {
        return $this->instanceList(self::KEY_LINE_ITEMS, \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LineItemResponseInterface[] $lineItems
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
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->requireString(self::KEY_CURRENCY);
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        return $this->set(self::KEY_CURRENCY, $currency);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[]
     */
    public function getTotals(): TotalsResponseInterface
    {
        return $this->requireInstance(self::KEY_TOTALS, \Magebit\UcpSpec\Api\Shopping\Types\TotalsResponseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface[] $totals
     * @return self
     */
    public function setTotals(TotalsResponseInterface $totals): self
    {
        return $this->set(self::KEY_TOTALS, $totals);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null
    {
        return $this->instanceListOrNull(self::KEY_MESSAGES, \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self
    {
        return $this->set(self::KEY_MESSAGES, $messages);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null
     */
    public function getLinks(): array|null
    {
        return $this->instanceListOrNull(self::KEY_LINKS, \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null $links
     * @return self
     */
    public function setLinks(array|null $links): self
    {
        return $this->set(self::KEY_LINKS, $links);
    }

    /**
     * @return string|null
     */
    public function getContinueUrl(): string|null
    {
        return $this->stringOrNull(self::KEY_CONTINUE_URL);
    }

    /**
     * @param string|null $continueUrl
     * @return self
     */
    public function setContinueUrl(string|null $continueUrl): self
    {
        return $this->set(self::KEY_CONTINUE_URL, $continueUrl);
    }

    /**
     * @return string|null
     */
    public function getExpiresAt(): string|null
    {
        return $this->stringOrNull(self::KEY_EXPIRES_AT);
    }

    /**
     * @param string|null $expiresAt
     * @return self
     */
    public function setExpiresAt(string|null $expiresAt): self
    {
        return $this->set(self::KEY_EXPIRES_AT, $expiresAt);
    }
}
