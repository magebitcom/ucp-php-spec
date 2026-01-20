<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Schemas\Shopping\Types;

/**
 * Schema: Payment Handler Response
 */
interface PaymentHandlerResponseInterface
{
    public const KEY_ID = 'id';
    public const KEY_NAME = 'name';
    public const KEY_VERSION = 'version';
    public const KEY_SPEC = 'spec';
    public const KEY_CONFIG_SCHEMA = 'config_schema';
    public const KEY_INSTRUMENT_SCHEMAS = 'instrument_schemas';
    public const KEY_CONFIG = 'config';

    /**
     * The unique identifier for this handler instance within the payment.handlers. Used by payment instruments to reference which handler produced them.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * The specification name using reverse-DNS format. For example, dev.ucp.delegate_payment.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Handler version in YYYY-MM-DD format.
     *
     * @return string
     */
    public function getVersion(): string;

    /**
     * A URI pointing to the technical specification or schema that defines how this handler operates.
     *
     * @return string
     */
    public function getSpec(): string;

    /**
     * A URI pointing to a JSON Schema used to validate the structure of the config object.
     *
     * @return string
     */
    public function getConfigSchema(): string;

    /**
     * @return string[]
     */
    public function getInstrumentSchemas(): array;

    /**
     * A dictionary containing provider-specific configuration details, such as merchant IDs, supported networks, or gateway credentials.
     *
     * @return object
     */
    public function getConfig(): object;
}
