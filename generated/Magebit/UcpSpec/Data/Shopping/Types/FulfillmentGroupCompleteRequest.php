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

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupCompleteRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A merchant-generated package/group of line items with fulfillment options.
 */
class FulfillmentGroupCompleteRequest extends SpecObject implements FulfillmentGroupCompleteRequestInterface
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
     * @return string|null
     */
    public function getSelectedOptionId(): string|null
    {
        return $this->get(self::KEY_SELECTED_OPTION_ID);
    }

    /**
     * @param string|null $selectedOptionId
     * @return self
     */
    public function setSelectedOptionId(string|null $selectedOptionId): self
    {
        return $this->set(self::KEY_SELECTED_OPTION_ID, $selectedOptionId);
    }
}
