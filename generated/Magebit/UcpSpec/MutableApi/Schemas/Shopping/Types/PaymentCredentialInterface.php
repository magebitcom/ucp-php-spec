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
 * Container for sensitive payment data. Use the specific schema matching the 'type' field.
 *
 * Schema: Payment Credential
 */
interface PaymentCredentialInterface
{
    /**
     * The specific type of token produced by the handler (e.g., 'stripe_token').
     *
     * @return string
     */
    public function getType(): string;

    /**
     * The specific type of token produced by the handler (e.g., 'stripe_token').
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;
}
