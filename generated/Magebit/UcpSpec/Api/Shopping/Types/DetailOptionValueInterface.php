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
 * An option value with availability signals relative to the current selections. Used in get_product responses where selected context exists.
 *
 * Schema: Detail Option Value
 */
interface DetailOptionValueInterface
{
    public const KEY_AVAILABLE = 'available';
    public const KEY_EXISTS = 'exists';
    public const KEY_ID = 'id';
    public const KEY_LABEL = 'label';

    /**
     * Whether a variant matching this value and the current option selections is purchasable.
     *
     * @return bool|null
     */
    public function getAvailable(): bool|null;

    /**
     * Whether a variant matching this value and the current option selections is purchasable.
     *
     * @param bool|null $available
     * @return self
     */
    public function setAvailable(bool|null $available): self;

    /**
     * Whether a variant matching this value and the current option selections exists in the catalog.
     *
     * @return bool|null
     */
    public function getExists(): bool|null;

    /**
     * Whether a variant matching this value and the current option selections exists in the catalog.
     *
     * @param bool|null $exists
     * @return self
     */
    public function setExists(bool|null $exists): self;

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
