<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * Pagination information in responses.
 */
interface PaginationResponseInterface
{
    public const KEY_CURSOR = 'cursor';
    public const KEY_HAS_NEXT_PAGE = 'has_next_page';
    public const KEY_TOTAL_COUNT = 'total_count';

    /**
     * Cursor to fetch the next page of results. MUST be present when has_next_page is true.
     *
     * @return string|null
     */
    public function getCursor(): string|null;

    /**
     * Cursor to fetch the next page of results. MUST be present when has_next_page is true.
     *
     * @param string|null $cursor
     * @return self
     */
    public function setCursor(string|null $cursor): self;

    /**
     * Whether more results are available.
     *
     * @return bool
     */
    public function getHasNextPage(): bool;

    /**
     * Whether more results are available.
     *
     * @param bool $hasNextPage
     * @return self
     */
    public function setHasNextPage(bool $hasNextPage): self;

    /**
     * Total number of matching items, if available.
     *
     * @return int|null
     */
    public function getTotalCount(): int|null;

    /**
     * Total number of matching items, if available.
     *
     * @param int|null $totalCount
     * @return self
     */
    public function setTotalCount(int|null $totalCount): self;
}
