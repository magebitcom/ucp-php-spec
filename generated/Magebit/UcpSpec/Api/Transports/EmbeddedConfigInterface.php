<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Transports;

/**
 * Per-session configuration for embedded transport binding. Allows businesses to vary EP availability and delegations based on cart contents, agent authorization, or policy.
 *
 * Schema: Embedded Transport Config
 */
interface EmbeddedConfigInterface
{
    public const KEY_DELEGATE = 'delegate';
    public const KEY_COLOR_SCHEME = 'color_scheme';

    /**
     * Delegations the business allows. At service-level, declares available delegations. In UCP responses, confirms accepted delegations for this session.
     *
     * @return string[]|null
     */
    public function getDelegate(): array|null;

    /**
     * Delegations the business allows. At service-level, declares available delegations. In UCP responses, confirms accepted delegations for this session.
     *
     * @param string[]|null $delegate
     * @return self
     */
    public function setDelegate(array|null $delegate): self;

    /**
     * Color schemes the business supports. Hosts use ec_color_scheme query parameter to request a scheme from this list.
     *
     * @return string[]|null
     */
    public function getColorScheme(): array|null;

    /**
     * Color schemes the business supports. Hosts use ec_color_scheme query parameter to request a scheme from this list.
     *
     * @param string[]|null $colorScheme
     * @return self
     */
    public function setColorScheme(array|null $colorScheme): self;
}
