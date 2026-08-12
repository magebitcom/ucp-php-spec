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

use Magebit\UcpSpec\Api\Shopping\Types\AccountInfoInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Non-sensitive backend identifiers for linking.
 */
class AccountInfo extends SpecObject implements AccountInfoInterface
{
    /**
     * @return string|null
     */
    public function getPaymentAccountReference(): string|null
    {
        return $this->stringOrNull(self::KEY_PAYMENT_ACCOUNT_REFERENCE);
    }

    /**
     * @param string|null $paymentAccountReference
     * @return self
     */
    public function setPaymentAccountReference(string|null $paymentAccountReference): self
    {
        return $this->set(self::KEY_PAYMENT_ACCOUNT_REFERENCE, $paymentAccountReference);
    }
}
