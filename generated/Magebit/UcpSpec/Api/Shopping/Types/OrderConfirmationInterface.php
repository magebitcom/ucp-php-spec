<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * Order details available at the time of checkout completion.
 *
 * Schema: Order Confirmation
 */
interface OrderConfirmationInterface
{
    public const KEY_ID = 'id';
    public const KEY_LABEL = 'label';
    public const KEY_PERMALINK_URL = 'permalink_url';
    public const CONSTRAINTS = ['permalink_url' => ['format' => 'uri']];

    /**
     * Unique order identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Unique order identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Human-readable label for identifying the order. MUST only be provided by the business.
     *
     * @return string|null
     */
    public function getLabel(): string|null;

    /**
     * Human-readable label for identifying the order. MUST only be provided by the business.
     *
     * @param string|null $label
     * @return self
     */
    public function setLabel(string|null $label): self;

    /**
     * Permalink to access the order on merchant site.
     *
     * @return string
     */
    public function getPermalinkUrl(): string;

    /**
     * Permalink to access the order on merchant site.
     *
     * @param string $permalinkUrl
     * @return self
     */
    public function setPermalinkUrl(string $permalinkUrl): self;
}
