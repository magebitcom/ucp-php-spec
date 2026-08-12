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
 * A specific option selection on a variant (e.g., Size: Large).
 *
 * Schema: Selected Option
 */
interface SelectedOptionInterface
{
    public const KEY_NAME = 'name';
    public const KEY_ID = 'id';
    public const KEY_LABEL = 'label';

    /**
     * Option name (e.g., 'Size').
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Option name (e.g., 'Size').
     *
     * @param string $name
     * @return self
     */
    public function setName(string $name): self;

    /**
     * Optional option value identifier from option_value.id. When present, the server SHOULD use it for matching; name and label remain required for display.
     *
     * @return string|null
     */
    public function getId(): string|null;

    /**
     * Optional option value identifier from option_value.id. When present, the server SHOULD use it for matching; name and label remain required for display.
     *
     * @param string|null $id
     * @return self
     */
    public function setId(string|null $id): self;

    /**
     * Selected option label (e.g., 'Large').
     *
     * @return string
     */
    public function getLabel(): string;

    /**
     * Selected option label (e.g., 'Large').
     *
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self;
}
