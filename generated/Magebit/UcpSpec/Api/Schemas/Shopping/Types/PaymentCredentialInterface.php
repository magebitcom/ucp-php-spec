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
 * The base definition for any payment credential. Handlers define specific credential types.
 *
 * Schema: Payment Credential
 */
interface PaymentCredentialInterface
{
    public const KEY_TYPE = 'type';

    /**
     * The credential type discriminator. Specific schemas will constrain this to a constant value.
     *
     * @return string
     */
    public function getType(): string;
}
