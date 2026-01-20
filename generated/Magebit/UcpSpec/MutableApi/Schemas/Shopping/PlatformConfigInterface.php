<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

/**
 * Platform's order capability configuration.
 *
 * Schema: Platform Order Config
 */
interface PlatformConfigInterface
{
    /**
     * URL where merchant sends order lifecycle events (webhooks).
     *
     * @return string
     */
    public function getWebhookUrl(): string;

    /**
     * URL where merchant sends order lifecycle events (webhooks).
     *
     * @param string $webhook_url
     * @return self
     */
    public function setWebhookUrl(string $webhook_url): self;
}
