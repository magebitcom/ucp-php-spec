<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping\Types;

use Magebit\UcpSpec\Schemas\Version;

/**
 * Schema: Payment Handler Response
 */
interface PaymentHandlerResponse
{
    /**
     * The unique identifier for this handler instance within the payment.handlers. Used by payment instruments to reference which handler produced them.
     *
     * @return string
     */
    function getId(): string;

    /**
     * The specification name using reverse-DNS format. For example, dev.ucp.delegate_payment.
     *
     * @return string
     */
    function getName(): string;

    /**
     * Handler version in YYYY-MM-DD format.
     *
     * @return Version
     */
    function getVersion(): Version;

    /**
     * A URI pointing to the technical specification or schema that defines how this handler operates.
     *
     * @return string
     */
    function getSpec(): string;

    /**
     * A URI pointing to a JSON Schema used to validate the structure of the config object.
     *
     * @return string
     */
    function getConfigSchema(): string;

    /**
     * @return string[]
     */
    function getInstrumentSchemas(): array;

    /**
     * A dictionary containing provider-specific configuration details, such as merchant IDs, supported networks, or gateway credentials.
     *
     * @return object
     */
    function getConfig(): object;
}
