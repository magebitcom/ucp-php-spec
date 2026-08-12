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
 * Optional seller context for this variant.
 */
interface VariantSellerInterface
{
    public const KEY_NAME = 'name';
    public const KEY_LINKS = 'links';

    /**
     * Seller display name.
     *
     * @return string|null
     */
    public function getName(): string|null;

    /**
     * Seller display name.
     *
     * @param string|null $name
     * @return self
     */
    public function setName(string|null $name): self;

    /**
     * Seller policy and information links.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null
     */
    public function getLinks(): array|null;

    /**
     * Seller policy and information links.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\LinkInterface[]|null $links
     * @return self
     */
    public function setLinks(array|null $links): self;
}
