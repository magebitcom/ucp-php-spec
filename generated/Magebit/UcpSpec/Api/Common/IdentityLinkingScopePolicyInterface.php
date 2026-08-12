<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Common;

use Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface;

/**
 * Per-scope policy and metadata — auth constraints (e.g. min_acr, max_token_age), declarative metadata (e.g. claims produced, consent descriptions), or any other scope-specific configuration. An empty object means user authentication is required with no additional policy. Open for non-breaking extension.
 *
 * Schema: Scope Policy
 */
interface IdentityLinkingScopePolicyInterface
{
    public const KEY_DESCRIPTION = 'description';

    /**
     * Optional human-readable description of the scope that platforms can use to present and explain context (requirement and value) to the user.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface|null
     */
    public function getDescription(): DescriptionInterface|null;

    /**
     * Optional human-readable description of the scope that platforms can use to present and explain context (requirement and value) to the user.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\Types\DescriptionInterface|null $description
     * @return self
     */
    public function setDescription(DescriptionInterface|null $description): self;
}
