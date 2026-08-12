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

use Magebit\UcpSpec\Api\Shopping\Types\FulfillmentGroupCreateRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A merchant-generated package/group of line items with fulfillment options.
 */
class FulfillmentGroupCreateRequest extends SpecObject implements FulfillmentGroupCreateRequestInterface
{
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
