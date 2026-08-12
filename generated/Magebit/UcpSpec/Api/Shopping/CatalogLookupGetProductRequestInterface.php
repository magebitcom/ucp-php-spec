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
use Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;

/**
 * Request body for single-product retrieval. Supports interactive variant narrowing via selected and preferences.
 */
interface CatalogLookupGetProductRequestInterface
{
    public const KEY_ID = 'id';
    public const KEY_SELECTED = 'selected';
    public const KEY_PREFERENCES = 'preferences';
    public const KEY_FILTERS = 'filters';
    public const KEY_CONTEXT = 'context';
    public const KEY_SIGNALS = 'signals';
    public const KEY_ATTRIBUTION = 'attribution';

    /**
     * Product or variant identifier. Implementations MUST support product ID and variant ID.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Product or variant identifier. Implementations MUST support product ID and variant ID.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Partial or full option selections for interactive variant narrowing. When provided, response option values include availability signals (available, exists) relative to these selections.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null
     */
    public function getSelected(): array|null;

    /**
     * Partial or full option selections for interactive variant narrowing. When provided, response option values include availability signals (available, exists) relative to these selections.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null $selected
     * @return self
     */
    public function setSelected(array|null $selected): self;

    /**
     * Option names in relaxation priority order. When no exact variant matches all selections, the server drops options from the end of this list first. E.g., ['Color', 'Size'] keeps Color and relaxes Size.
     *
     * @return string[]|null
     */
    public function getPreferences(): array|null;

    /**
     * Option names in relaxation priority order. When no exact variant matches all selections, the server drops options from the end of this list first. E.g., ['Color', 'Size'] keeps Color and relaxes Size.
     *
     * @param string[]|null $preferences
     * @return self
     */
    public function setPreferences(array|null $preferences): self;

    /**
     * Filter criteria to narrow returned variants. All specified filters combine with AND logic.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface|null
     */
    public function getFilters(): SearchFiltersInterface|null;

    /**
     * Filter criteria to narrow returned variants. All specified filters combine with AND logic.
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
