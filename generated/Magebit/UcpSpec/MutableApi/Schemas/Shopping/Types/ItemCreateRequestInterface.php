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
 * Schema: Item Create Request
 */
interface ItemCreateRequestInterface
{
    public const KEY_ID = 'id';

    /**
     * Should be recognized by both the Platform, and the Business. For Google it should match the id provided in the "id" field in the product feed.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Should be recognized by both the Platform, and the Business. For Google it should match the id provided in the "id" field in the product feed.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;
}
