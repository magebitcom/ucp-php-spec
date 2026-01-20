<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping\Types;

/**
 * Container for error, warning, or info messages.
 *
 * Schema: Message
 */
interface MessageInterface
{
    public const KEY_TYPE = 'type';
    public const KEY_CODE = 'code';
    public const KEY_PATH = 'path';
    public const KEY_CONTENT_TYPE = 'content_type';
    public const KEY_CONTENT = 'content';
    public const KEY_SEVERITY = 'severity';
    public const CONTENT_TYPE_PLAIN = 'plain';
    public const CONTENT_TYPE_MARKDOWN = 'markdown';
    public const SEVERITY_RECOVERABLE = 'recoverable';
    public const SEVERITY_REQUIRES_BUYER_INPUT = 'requires_buyer_input';
    public const SEVERITY_REQUIRES_BUYER_REVIEW = 'requires_buyer_review';

    /**
     * Message type discriminator.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Error code. Possible values include: missing, invalid, out_of_stock, payment_declined, requires_sign_in, requires_3ds, requires_identity_linking. Freeform codes also allowed.
     *
     * @return string
     */
    public function getCode(): string;

    /**
     * RFC 9535 JSONPath to the component the message refers to (e.g., $.items[1]).
     *
     * @return string|null
     */
    public function getPath(): string|null;

    /**
     * Content format, default = plain.
     *
     * @return string|null
     */
    public function getContentType(): string|null;

    /**
     * Human-readable message.
     *
     * @return string
     */
    public function getContent(): string;

    /**
     * Declares who resolves this error. 'recoverable': agent can fix via API. 'requires_buyer_input': merchant requires information their API doesn't support collecting programmatically (checkout incomplete). 'requires_buyer_review': buyer must authorize before order placement due to policy, regulatory, or entitlement rules (checkout complete). Errors with 'requires_*' severity contribute to 'status: requires_escalation'.
     *
     * @return string
     */
    public function getSeverity(): string;

    /**
     * Message type discriminator.
     *
     * @param string $type
     * @return self
     */
    public function setType(string $type): self;

    /**
     * Error code. Possible values include: missing, invalid, out_of_stock, payment_declined, requires_sign_in, requires_3ds, requires_identity_linking. Freeform codes also allowed.
     *
     * @param string $code
     * @return self
     */
    public function setCode(string $code): self;

    /**
     * RFC 9535 JSONPath to the component the message refers to (e.g., $.items[1]).
     *
     * @param string|null $path
     * @return self
     */
    public function setPath(?string $path): self;

    /**
     * Content format, default = plain.
     *
     * @param string|null $contentType
     * @return self
     */
    public function setContentType(?string $contentType): self;

    /**
     * Human-readable message.
     *
     * @param string $content
     * @return self
     */
    public function setContent(string $content): self;

    /**
     * Declares who resolves this error. 'recoverable': agent can fix via API. 'requires_buyer_input': merchant requires information their API doesn't support collecting programmatically (checkout incomplete). 'requires_buyer_review': buyer must authorize before order placement due to policy, regulatory, or entitlement rules (checkout complete). Errors with 'requires_*' severity contribute to 'status: requires_escalation'.
     *
     * @param string $severity
     * @return self
     */
    public function setSeverity(string $severity): self;
}
