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
 * An instrument type available from a payment handler with optional constraints.
 *
 * Schema: Available Payment Instrument
 */
interface AvailablePaymentInstrumentInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_CONSTRAINTS = 'constraints';

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
     * @return array<string, mixed>|null
     */
    public function getConstraints(): array|null;

    /**
     * Constraints on this instrument type. Structure depends on instrument type and active capabilities.
     *
     * @param array<string, mixed>|null $constraints
     * @return self
     */
    public function setConstraints(array|null $constraints): self;
}
