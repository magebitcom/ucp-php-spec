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

use Magebit\UcpSpec\Api\Shopping\Types\MessageInfoInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class MessageInfo extends SpecObject implements MessageInfoInterface
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
    public function getPath(): string|null
    {
        return $this->get(self::KEY_PATH);
    }

    /**
     * @param string|null $path
     * @return self
     */
    public function setPath(string|null $path): self
    {
        return $this->set(self::KEY_PATH, $path);
    }

    /**
     * @return string|null
     */
    public function getCode(): string|null
    {
        return $this->get(self::KEY_CODE);
    }

    /**
     * @param string|null $code
     * @return self
     */
    public function setCode(string|null $code): self
    {
        return $this->set(self::KEY_CODE, $code);
    }

    /**
     * @return string|null
     */
    public function getContentType(): string|null
    {
        return $this->get(self::KEY_CONTENT_TYPE);
    }

    /**
     * @param string|null $contentType
     * @return self
     */
    public function setContentType(string|null $contentType): self
    {
        return $this->set(self::KEY_CONTENT_TYPE, $contentType);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->get(self::KEY_CONTENT);
    }

    /**
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self
    {
        return $this->set(self::KEY_CONTENT, $content);
    }
}
