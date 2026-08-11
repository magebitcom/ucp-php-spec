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

use Magebit\UcpSpec\Api\Shopping\Types\BindingInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PaymentIdentityInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Binds a token to a specific checkout session and participant. Prevents token reuse across different checkouts or participants.
 */
class Binding extends SpecObject implements BindingInterface
{
    /**
     * @return string
     */
    public function getCheckoutId(): string
    {
        return $this->requireString(self::KEY_CHECKOUT_ID);
    }

    /**
     * @param string $checkoutId
     * @return self
     */
    public function setCheckoutId(string $checkoutId): self
    {
        return $this->set(self::KEY_CHECKOUT_ID, $checkoutId);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaymentIdentityInterface|null
     */
    public function getIdentity(): PaymentIdentityInterface|null
    {
        return $this->instanceOrNull(self::KEY_IDENTITY, \Magebit\UcpSpec\Api\Shopping\Types\PaymentIdentityInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaymentIdentityInterface|null $identity
     * @return self
     */
    public function setIdentity(PaymentIdentityInterface|null $identity): self
    {
        return $this->set(self::KEY_IDENTITY, $identity);
    }
}
