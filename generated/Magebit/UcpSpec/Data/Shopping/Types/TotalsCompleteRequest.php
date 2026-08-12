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

use Magebit\UcpSpec\Api\Shopping\Types\TotalsCompleteRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Pricing breakdown provided by the business. MUST contain exactly one subtotal and one total entry. Detail types (tax, fee, discount, fulfillment) may appear multiple times for itemization. Platforms MUST render all entries in order using display_text and amount.
 */
class TotalsCompleteRequest extends SpecObject implements TotalsCompleteRequestInterface
{
}
