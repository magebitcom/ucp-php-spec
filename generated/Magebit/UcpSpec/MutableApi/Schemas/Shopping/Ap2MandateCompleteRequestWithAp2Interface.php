<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

/**
 * Extension fields for complete_checkout when AP2 is negotiated.
 *
 * Schema: Complete Checkout Request with AP2
 */
interface Ap2MandateCompleteRequestWithAp2Interface
{
    /**
     * AP2 extension data including checkout mandate.
     *
     * @return Ap2MandateAp2CompleteRequestInterface|null
     */
    public function getAp2(): Ap2MandateAp2CompleteRequestInterface|null;

    /**
     * AP2 extension data including checkout mandate.
     *
     * @param Ap2MandateAp2CompleteRequestInterface|null $ap2
     * @return self
     */
    public function setAp2(?Ap2MandateAp2CompleteRequestInterface $ap2): self;
}
