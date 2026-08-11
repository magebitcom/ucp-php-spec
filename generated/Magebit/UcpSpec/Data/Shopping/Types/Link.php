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

use Magebit\UcpSpec\Api\Shopping\Types\LinkInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class Link extends SpecObject implements LinkInterface
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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->requireString(self::KEY_URL);
    }

    /**
     * @param string $url
     * @return self
     */
    public function setUrl(string $url): self
    {
        return $this->set(self::KEY_URL, $url);
    }

    /**
     * @return string|null
     */
    public function getTitle(): string|null
    {
        return $this->stringOrNull(self::KEY_TITLE);
    }

    /**
     * @param string|null $title
     * @return self
     */
    public function setTitle(string|null $title): self
    {
        return $this->set(self::KEY_TITLE, $title);
    }
}
