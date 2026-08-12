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

use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;

interface CatalogSearchSearchRequestInterface
{
    public const KEY_QUERY = 'query';
    public const KEY_CONTEXT = 'context';
    public const KEY_SIGNALS = 'signals';
    public const KEY_ATTRIBUTION = 'attribution';
    public const KEY_FILTERS = 'filters';
    public const KEY_PAGINATION = 'pagination';

    /**
     * Free-text search query.
     *
     * @return string|null
     */
    public function getQuery(): string|null;

    /**
     * Free-text search query.
     *
     * @param string|null $query
     * @return self
     */
    public function setQuery(string|null $query): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null
     */
    public function getContext(): ContextInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\ContextInterface|null $context
     * @return self
     */
    public function setContext(ContextInterface|null $context): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null
     */
    public function getSignals(): SignalsInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface|null $signals
     * @return self
     */
    public function setSignals(SignalsInterface|null $signals): self;

    /**
     * @return array<string, string>|null
     */
    public function getAttribution(): array|null;

    /**
     * @param array<string, string>|null $attribution
     * @return self
     */
    public function setAttribution(array|null $attribution): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface|null
     */
    public function getFilters(): SearchFiltersInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface|null $filters
     * @return self
     */
    public function setFilters(SearchFiltersInterface|null $filters): self;

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface|null
     */
    public function getPagination(): PaginationRequestInterface|null;

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface|null $pagination
     * @return self
     */
    public function setPagination(PaginationRequestInterface|null $pagination): self;
}
