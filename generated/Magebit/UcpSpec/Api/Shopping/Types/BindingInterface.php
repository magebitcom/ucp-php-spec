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
 * Binds a token to a specific checkout session and participant. Prevents token reuse across different checkouts or participants.
 *
 * Schema: Binding
 */
interface BindingInterface
{
    public const KEY_CHECKOUT_ID = 'checkout_id';
    public const KEY_IDENTITY = 'identity';

    /**
     * The checkout session identifier this token is bound to.
     *
     * @return string
     */
    public function getCheckoutId(): string;

    /**
     * The checkout session identifier this token is bound to.
     *
     * @param string $checkoutId
     * @return self
     */
    public function setCheckoutId(string $checkoutId): self;

    /**
     * The participant this token is bound to. Required when acting on behalf of another participant (e.g., agent tokenizing for merchant). Omit when the authenticated caller is the binding target.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaymentIdentityInterface|null
     */
    public function getIdentity(): PaymentIdentityInterface|null;

    /**
     * The participant this token is bound to. Required when acting on behalf of another participant (e.g., agent tokenizing for merchant). Omit when the authenticated caller is the binding target.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaymentIdentityInterface|null $identity
     * @return self
     */
    public function setIdentity(PaymentIdentityInterface|null $identity): self;
}
