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

use Magebit\UcpSpec\Api\Shopping\Types\DetailOptionValueInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * An option value with availability signals relative to the current selections. Used in get_product responses where selected context exists.
 */
class DetailOptionValue extends SpecObject implements DetailOptionValueInterface
{
    /**
     * @return bool|null
     */
    public function getAvailable(): bool|null
    {
        return $this->boolOrNull(self::KEY_AVAILABLE);
    }

    /**
     * @param bool|null $available
     * @return self
     */
    public function setAvailable(bool|null $available): self
    {
        return $this->set(self::KEY_AVAILABLE, $available);
    }

    /**
     * @return bool|null
     */
    public function getExists(): bool|null
    {
        return $this->boolOrNull(self::KEY_EXISTS);
    }

    /**
     * @param bool|null $exists
     * @return self
     */
    public function setExists(bool|null $exists): self
    {
        return $this->set(self::KEY_EXISTS, $exists);
    }

    /**
     * @return string|null
     */
    public function getId(): string|null
    {
        return $this->stringOrNull(self::KEY_ID);
    }

    /**
     * @param string|null $id
     * @return self
     */
    public function setId(string|null $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->requireString(self::KEY_LABEL);
    }

    /**
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self
    {
        return $this->set(self::KEY_LABEL, $label);
    }
}
