<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

/**
 * Identity of a participant for token binding. The access_token uniquely identifies the participant who tokens should be bound to.
 *
 * Schema: Payment Identity
 */
interface PaymentIdentity
{
    /**
     * Unique identifier for this participant, obtained during onboarding with the tokenizer.
     *
     * @return string
     */
    public function getAccessToken(): string;
}
