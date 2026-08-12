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

use Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductInterface;
use Magebit\UcpSpec\Api\Shopping\CatalogLookupGetProductResponseInterface;
use Magebit\UcpSpec\Api\Shopping\Types\MessageInterface;
use Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class CatalogLookupGetProductResponse extends SpecObject implements CatalogLookupGetProductResponseInterface
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
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductInterface
     */
    public function getProduct(): CatalogLookupDetailProductInterface
    {
        return $this->requireInstance(self::KEY_PRODUCT, \Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductInterface $product
     * @return self
     */
    public function setProduct(CatalogLookupDetailProductInterface $product): self
    {
        return $this->set(self::KEY_PRODUCT, $product);
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
