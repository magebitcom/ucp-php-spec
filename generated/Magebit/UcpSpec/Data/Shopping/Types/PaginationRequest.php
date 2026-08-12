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

use Magebit\UcpSpec\Api\Shopping\Types\PaginationRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Pagination parameters for requests.
 */
class PaginationRequest extends SpecObject implements PaginationRequestInterface
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
     * @return int|null
     */
    public function getLimit(): int|null
    {
        return $this->intOrNull(self::KEY_LIMIT);
    }

    /**
     * @param int|null $limit
     * @return self
     */
    public function setLimit(int|null $limit): self
    {
        return $this->set(self::KEY_LIMIT, $limit);
    }
}
