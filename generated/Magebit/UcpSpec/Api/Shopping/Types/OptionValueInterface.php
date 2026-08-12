<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping\Types;

/**
 * A selectable value for a product option.
 *
 * Schema: Option Value
 */
interface OptionValueInterface
{
    public const KEY_ID = 'id';
    public const KEY_LABEL = 'label';

    /**
     * Optional server-assigned identifier for this option value. When present in a selected_option, the server SHOULD use it for matching instead of label.
     *
     * @return string|null
     */
    public function getId(): string|null;

    /**
     * Optional server-assigned identifier for this option value. When present in a selected_option, the server SHOULD use it for matching instead of label.
     *
     * @param string|null $id
     * @return self
     */
    public function setId(string|null $id): self;

    /**
     * Display text for this option value (e.g., 'Small', 'Blue').
     *
     * @return string
     */
    public function getLabel(): string;

    /**
     * Display text for this option value (e.g., 'Small', 'Blue').
     *
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self;
}
