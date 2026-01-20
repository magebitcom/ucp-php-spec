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
    /**
     * @return UcpDiscoveryProfileInterface
     */
    public function getUcp(): UcpDiscoveryProfileInterface1;

    /**
     * Payment configuration containing handlers
     *
     * @return UCPDiscoveryProfilePaymentInterface|null
     */
    public function getPayment(): UCPDiscoveryProfilePaymentInterface|null;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @return UCPDiscoveryProfileSigningKeysItemInterface[]|null
     */
    public function getSigningKeys(): array|null;

    /**
     * @param UcpDiscoveryProfileInterface $ucp
     * @return self
     */
    public function setUcp(UcpDiscoveryProfileInterface1 $ucp): self;

    /**
     * Payment configuration containing handlers
     *
     * @param UCPDiscoveryProfilePaymentInterface|null $payment
     * @return self
     */
    public function setPayment(?UCPDiscoveryProfilePaymentInterface $payment): self;

    /**
     * Public keys for signature verification (JWK format). Used to verify signed responses, webhooks, and other authenticated messages from this party.
     *
     * @param UCPDiscoveryProfileSigningKeysItemInterface[]|null $signingKeys
     * @return self
     */
    public function setSigningKeys(?array $signingKeys): self;
}
