<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

/**
 * Inventory availability hint for a fulfillment method type.
 *
 * Schema: Fulfillment Available Method Response
 */
interface FulfillmentAvailableMethodResponseInterface
{
    public const TYPE_SHIPPING = 'shipping';
    public const TYPE_PICKUP = 'pickup';

    /**
     * Fulfillment method type this availability applies to.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Line items available for this fulfillment method.
     *
     * @return string[]
     */
    public function getLineItemIds(): array;

    /**
     * 'now' for immediate availability, or ISO 8601 date for future (preorders, transfers).
     *
     * @return string|null
     */
    public function getFulfillableOn(): string|null;

    /**
     * Human-readable availability info (e.g., 'Available for pickup at Downtown Store today').
     *
     * @return string|null
     */
    public function getDescription(): string|null;

    /**
     * Fulfillment method type this availability applies to.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Line items available for this fulfillment method.
     *
     * @param string[] $line_item_ids
     * @return self
     */
    public function setLineItemIds(array $line_item_ids): self;

    /**
     * 'now' for immediate availability, or ISO 8601 date for future (preorders, transfers).
     *
     * @param string|null $fulfillable_on
     * @return self
     */
    public function setFulfillableOn(string|null $fulfillable_on): self;

    /**
     * Human-readable availability info (e.g., 'Available for pickup at Downtown Store today').
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self;
}
