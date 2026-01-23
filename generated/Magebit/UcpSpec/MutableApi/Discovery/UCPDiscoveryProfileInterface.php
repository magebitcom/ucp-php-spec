<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Discovery;

use Magebit\UcpSpec\MutableApi\Schemas\UcpDiscoveryProfileInterface as UcpDiscoveryProfileInterface1;

/**
 * Schema for UCP discovery profile returned from /.well-known/ucp.
 *
 * Schema: UCP Discovery Profile
 */
interface UCPDiscoveryProfileInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_PAYMENT = 'payment';
    public const KEY_SIGNING_KEYS = 'signing_keys';

    /**
     * @return \Magebit\UcpSpec\MutableApi\Schemas\UcpDiscoveryProfileInterface
     */
    public function getUcp(): UcpDiscoveryProfileInterface1;

    /**
     * Payment configuration containing handlers
     *
     * @return \Magebit\UcpSpec\MutableApi\Discovery\UCPDiscoveryProfilePaymentInterface|null
     */
    public function getPayment(): UCPDiscoveryProfilePaymentInterface|null;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @return \Magebit\UcpSpec\MutableApi\Discovery\UCPDiscoveryProfileSigningKeysItemInterface[]|null
     */
    public function getSigningKeys(): array|null;

    /**
     * @param \Magebit\UcpSpec\MutableApi\Schemas\UcpDiscoveryProfileInterface $ucp
     * @return self
     */
    public function setUcp(UcpDiscoveryProfileInterface1 $ucp): self;

    /**
     * Payment configuration containing handlers
     *
     * @param \Magebit\UcpSpec\MutableApi\Discovery\UCPDiscoveryProfilePaymentInterface|null $payment
     * @return self
     */
    public function setPayment(?UCPDiscoveryProfilePaymentInterface $payment): self;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @param \Magebit\UcpSpec\MutableApi\Discovery\UCPDiscoveryProfileSigningKeysItemInterface[]|null $signingKeys
     * @return self
     */
    public function setSigningKeys(?array $signingKeys): self;
}
