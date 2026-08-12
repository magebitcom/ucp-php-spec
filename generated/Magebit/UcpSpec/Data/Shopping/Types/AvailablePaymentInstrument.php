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

use Magebit\UcpSpec\Api\Shopping\Types\AvailablePaymentInstrumentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * An instrument type available from a payment handler with optional constraints.
 */
class AvailablePaymentInstrument extends SpecObject implements AvailablePaymentInstrumentInterface
{
    /** @var string[] */
    protected array $jsonObjectKeys = ['constraints'];

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
     * @return array<string, mixed>|null
     */
    public function getConstraints(): array|null
    {
        return $this->arrayOrNull(self::KEY_CONSTRAINTS);
    }

    /**
     * @param array<string, mixed>|null $constraints
     * @return self
     */
    public function setConstraints(array|null $constraints): self
    {
        return $this->set(self::KEY_CONSTRAINTS, $constraints);
    }
}
