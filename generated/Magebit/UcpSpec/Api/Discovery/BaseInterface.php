<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Discovery;

use Magebit\UcpSpec\Api\Schemas\UcpBaseInterface;

/**
 * Base discovery profile with shared properties for all profile types.
 */
interface BaseInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_SIGNING_KEYS = 'signing_keys';

    /**
     * @return \Magebit\UcpSpec\Api\Schemas\UcpBaseInterface
     */
    public function getUcp(): UcpBaseInterface;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @return \Magebit\UcpSpec\Api\Discovery\SigningKeyInterface[]|null
     */
    public function getSigningKeys(): array|null;
}
