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
use Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ProductInterface;
use Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface;

interface CatalogSearchSearchResponseInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_PRODUCTS = 'products';
    public const KEY_PAGINATION = 'pagination';
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
     * Products matching the search criteria.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ProductInterface[]
     */
    public function getProducts(): array;

    /**
     * Products matching the search criteria.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ProductInterface[] $products
     * @return self
     */
    public function setProducts(array $products): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface|null
     */
    public function getPagination(): PaginationResponseInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface|null $pagination
     * @return self
     */
    public function setPagination(PaginationResponseInterface|null $pagination): self;

    /**
     * Errors, warnings, or informational messages about the search results.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Errors, warnings, or informational messages about the search results.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self;
}
