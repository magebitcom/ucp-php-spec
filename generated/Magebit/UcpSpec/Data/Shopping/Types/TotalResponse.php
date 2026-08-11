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

use Magebit\UcpSpec\Api\Shopping\Types\TotalResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class TotalResponse extends SpecObject implements TotalResponseInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->get(self::KEY_TYPE);
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
     * @return string|null
     */
    public function getDisplayText(): string|null
    {
        return $this->get(self::KEY_DISPLAY_TEXT);
    }

    /**
     * @param string|null $displayText
     * @return self
     */
    public function setDisplayText(string|null $displayText): self
    {
        return $this->set(self::KEY_DISPLAY_TEXT, $displayText);
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->get(self::KEY_AMOUNT);
    }

    /**
     * @param int $amount
     * @return self
     */
    public function setAmount(int $amount): self
    {
        return $this->set(self::KEY_AMOUNT, $amount);
    }
}
