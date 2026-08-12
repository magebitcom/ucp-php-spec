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

use Magebit\UcpSpec\Api\Shopping\Types\OptionValueInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A selectable value for a product option.
 */
class OptionValue extends SpecObject implements OptionValueInterface
{
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
