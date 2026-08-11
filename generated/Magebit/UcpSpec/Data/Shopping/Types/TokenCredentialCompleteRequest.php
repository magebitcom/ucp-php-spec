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

use Magebit\UcpSpec\Api\Shopping\Types\TokenCredentialCompleteRequestInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Base token credential schema. Concrete payment handlers may extend this schema with additional fields and define their own constraints.
 */
class TokenCredentialCompleteRequest extends SpecObject implements TokenCredentialCompleteRequestInterface
{
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->get(self::KEY_TYPE);
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        return $this->set(self::KEY_TYPE, $type);
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->get(self::KEY_TOKEN);
    }

    /**
     * @param string $token
     * @return self
     */
    public function setToken(string $token): self
    {
        return $this->set(self::KEY_TOKEN, $token);
    }
}
