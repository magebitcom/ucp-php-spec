<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Environment data provided by the platform to support authorization and abuse prevention. Values MUST NOT be buyer-asserted claims — platforms provide signals based on direct observation or independently verifiable third-party attestations. All signal keys MUST use reverse-domain naming to ensure provenance and prevent collisions when multiple extensions contribute to the shared namespace.
 */
class Signals extends SpecObject implements SignalsInterface
{
    /**
     * @return string|null
     */
    public function getDevUcpBuyerIp(): string|null
    {
        return $this->stringOrNull(self::KEY_DEV_UCP_BUYER_IP);
    }

    /**
     * @param string|null $devUcpBuyerIp
     * @return self
     */
    public function setDevUcpBuyerIp(string|null $devUcpBuyerIp): self
    {
        return $this->set(self::KEY_DEV_UCP_BUYER_IP, $devUcpBuyerIp);
    }

    /**
     * @return string|null
     */
    public function getDevUcpUserAgent(): string|null
    {
        return $this->stringOrNull(self::KEY_DEV_UCP_USER_AGENT);
    }

    /**
     * @param string|null $devUcpUserAgent
     * @return self
     */
    public function setDevUcpUserAgent(string|null $devUcpUserAgent): self
    {
        return $this->set(self::KEY_DEV_UCP_USER_AGENT, $devUcpUserAgent);
    }
}
