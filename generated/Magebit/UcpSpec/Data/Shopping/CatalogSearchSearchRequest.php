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

use Magebit\UcpSpec\Api\Shopping\CatalogSearchSearchRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class CatalogSearchSearchRequest extends SpecObject implements CatalogSearchSearchRequestInterface
{
    /**
     * @return string|null
     */
    public function getQuery(): string|null
    {
        return $this->stringOrNull(self::KEY_QUERY);
    }

    /**
     * @param string|null $query
     * @return self
     */
    public function setQuery(string|null $query): self
    {
        return $this->set(self::KEY_QUERY, $query);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null
    {
        return $this->instanceOrNull(self::KEY_CONTEXT, \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(ContextInterface|null $context): self
    {
        return $this->set(self::KEY_CONTEXT, $context);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null
     */
    public function getSignals(): SignalsInterface|null
    {
        return $this->instanceOrNull(self::KEY_SIGNALS, \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null $signals
     * @return self
     */
    public function setSignals(SignalsInterface|null $signals): self
    {
        return $this->set(self::KEY_SIGNALS, $signals);
    }

    /**
     * @return array<string, string>|null
     */
    public function getAttribution(): array|null
    {
        return $this->arrayOrNull(self::KEY_ATTRIBUTION);
    }

    /**
     * @param array<string, string>|null $attribution
     * @return self
     */
    public function setAttribution(array|null $attribution): self
    {
        return $this->set(self::KEY_ATTRIBUTION, $attribution);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface|null
     */
    public function getFilters(): SearchFiltersInterface|null
    {
        return $this->instanceOrNull(self::KEY_FILTERS, \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface|null $filters
     * @return self
     */
    public function setFilters(SearchFiltersInterface|null $filters): self
    {
        return $this->set(self::KEY_FILTERS, $filters);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface|null
     */
    public function getPagination(): PaginationRequestInterface|null
    {
        return $this->instanceOrNull(self::KEY_PAGINATION, \Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface|null $pagination
     * @return self
     */
    public function setPagination(PaginationRequestInterface|null $pagination): self
    {
        return $this->set(self::KEY_PAGINATION, $pagination);
    }
}
