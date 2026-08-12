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
use Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;

/**
 * Request body for catalog lookup.
 */
interface CatalogLookupLookupRequestInterface
{
    public const KEY_IDS = 'ids';
    public const KEY_FILTERS = 'filters';
    public const KEY_CONTEXT = 'context';
    public const KEY_SIGNALS = 'signals';
    public const KEY_ATTRIBUTION = 'attribution';

    /**
     * Identifiers to lookup. Implementations MUST support product ID and variant ID; MAY support secondary identifiers (SKU, handle, etc.).
     *
     * @return string[]
     */
    public function getIds(): array;

    /**
     * Identifiers to lookup. Implementations MUST support product ID and variant ID; MAY support secondary identifiers (SKU, handle, etc.).
     *
     * @param string[] $ids
     * @return self
     */
    public function setIds(array $ids): self;

    /**
     * Filter criteria to narrow returned products and variants. All specified filters combine with AND logic.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface|null
     */
    public function getFilters(): SearchFiltersInterface|null;

    /**
     * Filter criteria to narrow returned products and variants. All specified filters combine with AND logic.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface|null $filters
     * @return self
     */
    public function setFilters(SearchFiltersInterface|null $filters): self;

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
}
