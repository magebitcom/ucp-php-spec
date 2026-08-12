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

use Magebit\UcpSpec\Api\Shopping\Types\InputCorrelationInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Maps a request identifier to the variant it resolved to, with match semantics.
 */
class InputCorrelation extends SpecObject implements InputCorrelationInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->requireString(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return string|null
     */
    public function getMatch(): string|null
    {
        return $this->stringOrNull(self::KEY_MATCH);
    }

    /**
     * @param string|null $match
     * @return self
     */
    public function setMatch(string|null $match): self
    {
        return $this->set(self::KEY_MATCH, $match);
    }
}
