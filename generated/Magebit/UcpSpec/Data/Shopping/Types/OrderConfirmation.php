<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Shopping\Types;

use Magebit\UcpSpec\Api\Shopping\Types\OrderConfirmationInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Order details available at the time of checkout completion.
 */
class OrderConfirmation extends SpecObject implements OrderConfirmationInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->get(self::KEY_ID);
    }

    /**
     * @param string $id
     * @return self
     */
    public function setId(string $id): self
    {
        return $this->set(self::KEY_ID, $id);
    }

    /**
     * @return string
     */
    public function getPermalinkUrl(): string
    {
        return $this->get(self::KEY_PERMALINK_URL);
    }

    /**
     * @param string $permalinkUrl
     * @return self
     */
    public function setPermalinkUrl(string $permalinkUrl): self
    {
        return $this->set(self::KEY_PERMALINK_URL, $permalinkUrl);
    }
}
