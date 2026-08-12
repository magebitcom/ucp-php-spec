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

/**
 * Maps a request identifier to the variant it resolved to, with match semantics.
 *
 * Schema: Input Correlation
 */
interface InputCorrelationInterface
{
    public const KEY_ID = 'id';
    public const KEY_MATCH = 'match';

    /**
     * The identifier from the lookup request that resolved to this variant.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * The identifier from the lookup request that resolved to this variant.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * How the request identifier resolved to this variant. Well-known values: `exact` (input directly identifies this variant, e.g., variant ID, SKU), `featured` (server selected this variant as representative, e.g., product ID resolved to best match). Businesses MAY implement and provide additional resolution strategies.
     *
     * @return string|null
     */
    public function getMatch(): string|null;

    /**
     * How the request identifier resolved to this variant. Well-known values: `exact` (input directly identifies this variant, e.g., variant ID, SKU), `featured` (server selected this variant as representative, e.g., product ID resolved to best match). Businesses MAY implement and provide additional resolution strategies.
     *
     * @param string|null $match
     * @return self
     */
    public function setMatch(string|null $match): self;
}
