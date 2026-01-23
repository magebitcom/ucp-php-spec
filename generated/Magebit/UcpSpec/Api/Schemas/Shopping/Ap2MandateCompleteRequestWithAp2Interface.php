<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping;

/**
 * Extension fields for complete_checkout when AP2 is negotiated.
 *
 * Schema: Complete Checkout Request with AP2
 */
interface Ap2MandateCompleteRequestWithAp2Interface
{
    public const KEY_AP2 = 'ap2';

    /**
     * AP2 extension data including checkout mandate.
     *
     * @return \Magebit\UcpSpec\Api\Schemas\Shopping\Ap2MandateAp2CompleteRequestInterface|null
     */
    public function getAp2(): Ap2MandateAp2CompleteRequestInterface|null;
}
