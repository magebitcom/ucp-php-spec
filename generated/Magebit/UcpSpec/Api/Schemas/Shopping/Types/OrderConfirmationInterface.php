<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

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
}
