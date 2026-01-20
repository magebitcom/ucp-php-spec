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
 * Order details available at the time of checkout completion.
 *
 * Schema: Order Confirmation
 */
interface OrderConfirmationInterface
{
    /**
     * Unique order identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Permalink to access the order on merchant site.
     *
     * @return string
     */
    public function getPermalinkUrl(): string;

    /**
     * Unique order identifier.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Permalink to access the order on merchant site.
     *
     * @param string $permalinkUrl
     * @return self
     */
    public function setPermalinkUrl(string $permalinkUrl): self;
}
