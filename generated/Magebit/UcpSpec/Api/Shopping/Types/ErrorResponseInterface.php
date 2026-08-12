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

use Magebit\UcpSpec\Api\UcpErrorInterface;

/**
 * Generic error response when business logic prevents resource creation or failed to retrieve resource. Used when no valid resource can be established.
 *
 * Schema: Error Response
 */
interface ErrorResponseInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_MESSAGES = 'messages';
    public const KEY_CONTINUE_URL = 'continue_url';

    /**
     * UCP protocol metadata. Status MUST be 'error' for error response.
     *
     * @return \Magebit\UcpSpec\Api\UcpErrorInterface
     */
    public function getUcp(): UcpErrorInterface;

    /**
     * UCP protocol metadata. Status MUST be 'error' for error response.
     *
     * @param \Magebit\UcpSpec\Api\UcpErrorInterface $ucp
     * @return self
     */
    public function setUcp(UcpErrorInterface $ucp): self;

    /**
     * Array of messages describing why the operation failed.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]
     */
    public function getMessages(): array;

    /**
     * Array of messages describing why the operation failed.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[] $messages
     * @return self
     */
    public function setMessages(array $messages): self;

    /**
     * URL for buyer handoff or session recovery.
     *
     * @return string|null
     */
    public function getContinueUrl(): string|null;

    /**
     * URL for buyer handoff or session recovery.
     *
     * @param string|null $continueUrl
     * @return self
     */
    public function setContinueUrl(string|null $continueUrl): self;
}
