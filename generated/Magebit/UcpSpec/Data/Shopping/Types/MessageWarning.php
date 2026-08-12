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

use Magebit\UcpSpec\Api\Shopping\Types\MessageWarningInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class MessageWarning extends SpecObject implements MessageWarningInterface
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
     * @return string|null
     */
    public function getPath(): string|null
    {
        return $this->stringOrNull(self::KEY_PATH);
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
     * @return string
     */
    public function getCode(): string
    {
        return $this->requireString(self::KEY_CODE);
    }

    /**
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self
    {
        return $this->set(self::KEY_CODE, $code);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->requireString(self::KEY_CONTENT);
    }

    /**
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self
    {
        return $this->set(self::KEY_CONTENT, $content);
    }

    /**
     * @return string|null
     */
    public function getContentType(): string|null
    {
        return $this->stringOrNull(self::KEY_CONTENT_TYPE);
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
     * @return string|null
     */
    public function getPresentation(): string|null
    {
        return $this->stringOrNull(self::KEY_PRESENTATION);
    }

    /**
     * @param string|null $presentation
     * @return self
     */
    public function setPresentation(string|null $presentation): self
    {
        return $this->set(self::KEY_PRESENTATION, $presentation);
    }

    /**
     * @return string|null
     */
    public function getImageUrl(): string|null
    {
        return $this->stringOrNull(self::KEY_IMAGE_URL);
    }

    /**
     * @param string|null $imageUrl
     * @return self
     */
    public function setImageUrl(string|null $imageUrl): self
    {
        return $this->set(self::KEY_IMAGE_URL, $imageUrl);
    }

    /**
     * @return string|null
     */
    public function getUrl(): string|null
    {
        return $this->stringOrNull(self::KEY_URL);
    }

    /**
     * @param string|null $url
     * @return self
     */
    public function setUrl(string|null $url): self
    {
        return $this->set(self::KEY_URL, $url);
    }
}
