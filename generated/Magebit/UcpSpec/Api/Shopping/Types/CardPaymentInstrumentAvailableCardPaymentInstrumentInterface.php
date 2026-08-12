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
 * Declares card instrument availability with card-specific constraints.
 *
 * Schema: Available Card Payment Instrument
 */
interface CardPaymentInstrumentAvailableCardPaymentInstrumentInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_CONSTRAINTS = 'constraints';
    public const TYPE_CARD = 'card';

    /**
     * The instrument type identifier (e.g., 'card', 'gift_card'). References an instrument schema's type constant.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * The instrument type identifier (e.g., 'card', 'gift_card'). References an instrument schema's type constant.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Constraints on this instrument type. Structure depends on instrument type and active capabilities.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null
     */
    public function getConstraints(): CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null;

    /**
     * Constraints on this instrument type. Structure depends on instrument type and active capabilities.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null $constraints
     * @return self
     */
    public function setConstraints(
        CardPaymentInstrumentAvailableCardPaymentInstrumentConstraintsInterface|null $constraints,
    ): self;
}
