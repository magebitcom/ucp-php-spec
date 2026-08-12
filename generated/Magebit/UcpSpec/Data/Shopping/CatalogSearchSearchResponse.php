<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\CatalogSearchSearchResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ProductInterface;
use Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class CatalogSearchSearchResponse extends SpecObject implements CatalogSearchSearchResponseInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface
     */
    public function getUcp(): UcpResponseCatalogSchemaInterface
    {
        return $this->requireInstance(self::KEY_UCP, \Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface $ucp
     * @return self
     */
    public function setUcp(UcpResponseCatalogSchemaInterface $ucp): self
    {
        return $this->set(self::KEY_UCP, $ucp);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ProductInterface[]
     */
    public function getProducts(): array
    {
        return $this->instanceList(self::KEY_PRODUCTS, \Magebit\UcpSpec\Api\Shopping\Types\ProductInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ProductInterface[] $products
     * @return self
     */
    public function setProducts(array $products): self
    {
        return $this->set(self::KEY_PRODUCTS, $products);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface|null
     */
    public function getPagination(): PaginationResponseInterface|null
    {
        return $this->instanceOrNull(self::KEY_PAGINATION, \Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface|null $pagination
     * @return self
     */
    public function setPagination(PaginationResponseInterface|null $pagination): self
    {
        return $this->set(self::KEY_PAGINATION, $pagination);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null
    {
        return $this->instanceListOrNull(self::KEY_MESSAGES, \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self
    {
        return $this->set(self::KEY_MESSAGES, $messages);
    }
}
