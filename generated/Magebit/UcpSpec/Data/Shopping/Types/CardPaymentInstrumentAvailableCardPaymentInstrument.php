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

use Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface;
use Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Declares card instrument availability with card-specific constraints.
 */
class CardPaymentInstrumentAvailableCardPaymentInstrument extends SpecObject implements CardPaymentInstrumentAvailableCardPaymentInstrumentInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->requireString(self::KEY_TYPE);
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        return $this->set(self::KEY_TYPE, $type);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null
     */
    public function getConstraints(): CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null
    {
        return $this->instanceOrNull(self::KEY_CONSTRAINTS, \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null $constraints
     * @return self
     */
    public function setConstraints(
        CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null $constraints,
    ): self {
        return $this->set(self::KEY_CONSTRAINTS, $constraints);
    }
}
