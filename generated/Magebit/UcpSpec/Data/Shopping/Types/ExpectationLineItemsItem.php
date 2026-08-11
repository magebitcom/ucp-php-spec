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

use Magebit\UcpSpec\Api\Shopping\Types\ExpectationLineItemsItemInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

class ExpectationLineItemsItem extends SpecObject implements ExpectationLineItemsItemInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->get(self::KEY_ID);
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
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->get(self::KEY_QUANTITY);
    }

    /**
     * @param int $quantity
     * @return self
     */
    public function setQuantity(int $quantity): self
    {
        return $this->set(self::KEY_QUANTITY, $quantity);
    }
}
