<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas;

interface PaymentHandlerBaseInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_SPEC = 'spec';
    public const KEY_SCHEMA = 'schema';
    public const KEY_ID = 'id';
    public const KEY_CONFIG = 'config';

    /**
     * Entity version in YYYY-MM-DD format.
     *
     * @return \Magebit\UcpSpec\MutableApi\Schemas\PaymentHandlerVersionInterface
     */
    public function getVersion(): PaymentHandlerVersionInterface;

    /**
     * URL to human-readable specification document.
     *
     * @return string|null
     */
    public function getSpec(): string|null;

    /**
     * URL to JSON Schema defining this entity's structure and payloads.
     *
     * @return string|null
     */
    public function getSchema(): string|null;

    /**
     * Unique identifier for this entity instance. Used to disambiguate when multiple instances exist.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Entity-specific configuration. Structure defined by each entity's schema.
     *
     * @return array<mixed>|null
     */
    public function getConfig(): array|null;

    /**
     * Entity version in YYYY-MM-DD format.
     *
     * @param \Magebit\UcpSpec\MutableApi\Schemas\PaymentHandlerVersionInterface $version
     * @return self
     */
    public function setVersion(PaymentHandlerVersionInterface $version): self;

    /**
     * URL to human-readable specification document.
     *
     * @param string|null $spec
     * @return self
     */
    public function setSpec(?string $spec): self;

    /**
     * URL to JSON Schema defining this entity's structure and payloads.
     *
     * @param string|null $schema
     * @return self
     */
    public function setSchema(?string $schema): self;

    /**
     * Unique identifier for this entity instance. Used to disambiguate when multiple instances exist.
     *
     * @param string $id
     * @return self
     */
    public function setId(string $id): self;

    /**
     * Entity-specific configuration. Structure defined by each entity's schema.
     *
     * @param array<mixed>|null $config
     * @return self
     */
    public function setConfig(?array $config): self;
}
