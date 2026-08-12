<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Common;

use Magebit\UcpSpec\Api\Common\IdentityLinkingScopePolicyInterface;
use Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Per-scope policy and metadata — auth constraints (e.g. min_acr, max_token_age), declarative metadata (e.g. claims produced, consent descriptions), or any other scope-specific configuration. An empty object means user authentication is required with no additional policy. Open for non-breaking extension.
 */
class IdentityLinkingScopePolicy extends SpecObject implements IdentityLinkingScopePolicyInterface
{
    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface|null
     */
    public function getDescription(): DescriptionInterface|null
    {
        return $this->instanceOrNull(self::KEY_DESCRIPTION, \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface::class);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface|null $description
     * @return self
     */
    public function setDescription(DescriptionInterface|null $description): self
    {
        return $this->set(self::KEY_DESCRIPTION, $description);
    }
}
