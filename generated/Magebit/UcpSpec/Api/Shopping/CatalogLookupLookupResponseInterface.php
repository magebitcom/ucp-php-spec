<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ProductInterface;
use Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface;

interface CatalogLookupLookupResponseInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_PRODUCTS = 'products';
    public const KEY_MESSAGES = 'messages';

    /**
     * @return \Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface
     */
    public function getUcp(): UcpResponseCatalogSchemaInterface;

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseCatalogSchemaInterface $ucp): self;

    /**
     * Products matching the requested identifiers. May contain fewer items if some identifiers not found, or more if identifiers match multiple products.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ProductInterface[]
     */
    public function getProducts(): array;

    /**
     * Products matching the requested identifiers. May contain fewer items if some identifiers not found, or more if identifiers match multiple products.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ProductInterface[] $products
     * @return self
     */
    public function setProducts(array $products): self;

    /**
     * Errors, warnings, or informational messages about the requested items.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Errors, warnings, or informational messages about the requested items.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self;
}
