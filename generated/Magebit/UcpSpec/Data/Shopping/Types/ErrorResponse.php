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

use Magebit\UcpSpec\Api\Shopping\Types\ErrorResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\UcpErrorInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Generic error response when business logic prevents resource creation or failed to retrieve resource. Used when no valid resource can be established.
 */
class ErrorResponse extends SpecObject implements ErrorResponseInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpErrorInterface
     */
    public function getUcp(): UcpErrorInterface
    {
        return $this->requireInstance(self::KEY_UCP, \Magebit\UcpSpec\Api\UcpErrorInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpErrorInterface $ucp
     * @return self
     */
    public function setUcp(UcpErrorInterface $ucp): self
    {
        return $this->set(self::KEY_UCP, $ucp);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]
     */
    public function getMessages(): array
    {
        return $this->instanceList(self::KEY_MESSAGES, \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[] $messages
     * @return self
     */
    public function setMessages(array $messages): self
    {
        return $this->set(self::KEY_MESSAGES, $messages);
    }

    /**
     * @return string|null
     */
    public function getContinueUrl(): string|null
    {
        return $this->stringOrNull(self::KEY_CONTINUE_URL);
    }

    /**
     * @param string|null $continueUrl
     * @return self
     */
    public function setContinueUrl(string|null $continueUrl): self
    {
        return $this->set(self::KEY_CONTINUE_URL, $continueUrl);
    }
}
