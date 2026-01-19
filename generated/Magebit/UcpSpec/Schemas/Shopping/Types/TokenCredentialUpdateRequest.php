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
 * Base token credential schema. Concrete payment handlers may extend this schema with additional fields and define their own constraints.
 *
 * Schema: Token Credential Update Request
 */
interface TokenCredentialUpdateRequest
{
    /**
     * The specific type of token produced by the handler (e.g., 'stripe_token').
     *
     * @return string
     */
    public function getType(): string;

    /**
     * The token value.
     *
     * @return string
     */
    public function getToken(): string;
}
