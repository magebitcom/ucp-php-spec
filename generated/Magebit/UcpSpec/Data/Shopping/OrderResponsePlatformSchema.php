<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping;

use Magebit\UcpSpec\Api\Shopping\OrderResponsePlatformSchemaInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Platform's order capability configuration.
 */
class OrderResponsePlatformSchema extends SpecObject implements OrderResponsePlatformSchemaInterface
{
    /**
     * @return string
     */
    public function getWebhookUrl(): string
    {
        return $this->requireString(self::KEY_WEBHOOK_URL);
    }

    /**
     * @param string $webhookUrl
     * @return self
     */
    public function setWebhookUrl(string $webhookUrl): self
    {
        return $this->set(self::KEY_WEBHOOK_URL, $webhookUrl);
    }
}
