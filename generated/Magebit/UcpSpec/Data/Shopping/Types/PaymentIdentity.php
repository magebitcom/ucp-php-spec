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

use Magebit\UcpSpec\Api\Shopping\Types\PaymentIdentityInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Identity of a participant for token binding. The access_token uniquely identifies the participant who tokens should be bound to.
 */
class PaymentIdentity extends SpecObject implements PaymentIdentityInterface
{
    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->requireString(self::KEY_ACCESS_TOKEN);
    }

    /**
     * @param string $accessToken
     * @return self
     */
    public function setAccessToken(string $accessToken): self
    {
        return $this->set(self::KEY_ACCESS_TOKEN, $accessToken);
    }
}
