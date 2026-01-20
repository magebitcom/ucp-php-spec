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
 * Container for sensitive payment data. Use the specific schema matching the 'type' field.
 *
 * Schema: Payment Credential
 */
interface PaymentCredentialInterface
{
    public const KEY_TYPE = 'type';

    /**
     * The specific type of token produced by the handler (e.g., 'stripe_token').
     *
     * @return string
     */
    public function getType(): string;
}
