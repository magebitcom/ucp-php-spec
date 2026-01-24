<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Transports;

/**
 * Per-checkout configuration for embedded transport binding. Allows businesses to vary ECP availability and delegations based on cart contents, agent authorization, or policy.
 *
 * Schema: Embedded Transport Config
 */
interface EmbeddedTransportConfigInterface
{
    public const KEY_DELEGATE = 'delegate';

    /**
     * Delegations the business allows. At service-level, declares available delegations. In checkout responses, confirms accepted delegations for this session.
     *
     * @return string[]|null
     */
    public function getDelegate(): array|null;
}
