<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * Environment data provided by the platform to support authorization and abuse prevention. Values MUST NOT be buyer-asserted claims — platforms provide signals based on direct observation or independently verifiable third-party attestations. All signal keys MUST use reverse-domain naming to ensure provenance and prevent collisions when multiple extensions contribute to the shared namespace.
 *
 * Schema: Signals
 */
interface SignalsInterface
{
    public const KEY_DEV_UCP_BUYER_IP = 'dev_ucp_buyer_ip';
    public const KEY_DEV_UCP_USER_AGENT = 'dev_ucp_user_agent';

    /**
     * Client's IP address (IPv4 or IPv6).
     *
     * @return string|null
     */
    public function getDevUcpBuyerIp(): string|null;

    /**
     * Client's IP address (IPv4 or IPv6).
     *
     * @param string|null $devUcpBuyerIp
     * @return self
     */
    public function setDevUcpBuyerIp(string|null $devUcpBuyerIp): self;

    /**
     * Client's HTTP User-Agent header or equivalent.
     *
     * @return string|null
     */
    public function getDevUcpUserAgent(): string|null;

    /**
     * Client's HTTP User-Agent header or equivalent.
     *
     * @param string|null $devUcpUserAgent
     * @return self
     */
    public function setDevUcpUserAgent(string|null $devUcpUserAgent): self;
}
