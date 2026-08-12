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
 * Pagination parameters for requests.
 */
interface PaginationRequestInterface
{
    public const KEY_CURSOR = 'cursor';
    public const KEY_LIMIT = 'limit';

    /**
     * Opaque cursor from previous response.
     *
     * @return string|null
     */
    public function getCursor(): string|null;

    /**
     * Opaque cursor from previous response.
     *
     * @param string|null $cursor
     * @return self
     */
    public function setCursor(string|null $cursor): self;

    /**
     * Requested page size. Implementations MAY clamp to a lower maximum.
     *
     * @return int|null
     */
    public function getLimit(): int|null;

    /**
     * Requested page size. Implementations MAY clamp to a lower maximum.
     *
     * @param int|null $limit
     * @return self
     */
    public function setLimit(int|null $limit): self;
}
