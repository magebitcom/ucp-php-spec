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
use Magebit\UcpSpec\Api\UcpResponseCatalogSchemaInterface;

interface CatalogLookupGetProductResponseInterface
{
    public const KEY_UCP = 'ucp';
    public const KEY_PRODUCT = 'product';
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
     * The requested product with full detail. Singular — this is a single-resource operation.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductInterface
     */
    public function getProduct(): CatalogLookupDetailProductInterface;

    /**
     * The requested product with full detail. Singular — this is a single-resource operation.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\CatalogLookupDetailProductInterface $product
     * @return self
     */
    public function setProduct(CatalogLookupDetailProductInterface $product): self;

    /**
     * Warnings or informational messages about the product (e.g., price recently changed, limited availability).
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null
     */
    public function getMessages(): array|null;

    /**
     * Warnings or informational messages about the product (e.g., price recently changed, limited availability).
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\MessageInterface[]|null $messages
     * @return self
     */
    public function setMessages(array|null $messages): self;
}
