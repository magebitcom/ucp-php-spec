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

use Magebit\UcpSpec\Api\Shopping\CatalogLookupGetProductRequestInterface;
use Magebit\UcpSpec\Api\Shopping\Types\ContextInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SearchFiltersInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface;
use Magebit\UcpSpec\Api\Shopping\Types\SignalsInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Request body for single-product retrieval. Supports interactive variant narrowing via selected and preferences.
 */
class CatalogLookupGetProductRequest extends SpecObject implements CatalogLookupGetProductRequestInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->requireString(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null
     */
    public function getSelected(): array|null
    {
        return $this->instanceListOrNull(self::KEY_SELECTED, \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\SelectedOptionInterface[]|null $selected
     * @return self
     */
    public function setSelected(array|null $selected): self
    {
        return $this->set(self::KEY_SELECTED, $selected);
    }

    /**
     * @return string[]|null
     */
    public function getPreferences(): array|null
    {
        return $this->arrayOrNull(self::KEY_PREFERENCES);
    }

    /**
     * @param string[]|null $preferences
     * @return self
     */
    public function setPreferences(array|null $preferences): self
    {
        return $this->set(self::KEY_PREFERENCES, $preferences);
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
}
