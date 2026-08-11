<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Transports;

use Magebit\UcpSpec\Api\Transports\EmbeddedConfigInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Per-checkout configuration for embedded transport binding. Allows businesses to vary ECP availability and delegations based on cart contents, agent authorization, or policy.
 */
class EmbeddedConfig extends SpecObject implements EmbeddedConfigInterface
{
    /**
     * @return string[]|null
     */
    public function getDelegate(): array|null
    {
        return $this->get(self::KEY_DELEGATE);
    }

    /**
     * @param string[]|null $delegate
     * @return self
     */
    public function setDelegate(array|null $delegate): self
    {
        return $this->set(self::KEY_DELEGATE, $delegate);
    }
}
