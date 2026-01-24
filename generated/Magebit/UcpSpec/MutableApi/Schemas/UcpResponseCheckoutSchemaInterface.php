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

/**
 * UCP metadata for checkout responses.
 *
 * Schema: UCP Checkout Response Schema
 */
interface UcpResponseCheckoutSchemaInterface
{
    public const KEY_VERSION = 'version';
    public const KEY_SERVICES = 'services';
    public const KEY_CAPABILITIES = 'capabilities';
    public const KEY_PAYMENT_HANDLERS = 'payment_handlers';

    /**
     * @return string
     */
    public function getVersion(): string;

    /**
     * @return mixed
     */
    public function getServices();

    /**
     * @return mixed
     */
    public function getCapabilities();

    /**
     * @return mixed
     */
    public function getPaymentHandlers();

    /**
     * @param string $version
     * @return self
     */
    public function setVersion(string $version): self;

    /**
     * @param mixed $services
     * @return self
     */
    public function setServices($services): self;

    /**
     * @param mixed $capabilities
     * @return self
     */
    public function setCapabilities($capabilities): self;

    /**
     * @param mixed $paymentHandlers
     * @return self
     */
    public function setPaymentHandlers($paymentHandlers): self;
}
