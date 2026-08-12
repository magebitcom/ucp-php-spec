<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\PaginationResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Pagination information in responses.
 */
class PaginationResponse extends SpecObject implements PaginationResponseInterface
{
    /**
     * @return string|null
     */
    public function getCursor(): string|null
    {
        return $this->stringOrNull(self::KEY_CURSOR);
    }

    /**
     * @param string|null $cursor
     * @return self
     */
    public function setCursor(string|null $cursor): self
    {
        return $this->set(self::KEY_CURSOR, $cursor);
    }

    /**
     * @return bool
     */
    public function getHasNextPage(): bool
    {
        return $this->requireBool(self::KEY_HAS_NEXT_PAGE);
    }

    /**
     * @param bool $hasNextPage
     * @return self
     */
    public function setHasNextPage(bool $hasNextPage): self
    {
        return $this->set(self::KEY_HAS_NEXT_PAGE, $hasNextPage);
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): int|null
    {
        return $this->intOrNull(self::KEY_TOTAL_COUNT);
    }

    /**
     * @param int|null $totalCount
     * @return self
     */
    public function setTotalCount(int|null $totalCount): self
    {
        return $this->set(self::KEY_TOTAL_COUNT, $totalCount);
    }
}
