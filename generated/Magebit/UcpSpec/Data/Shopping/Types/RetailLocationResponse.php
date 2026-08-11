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

use Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface;
use Magebit\UcpSpec\Api\Shopping\Types\RetailLocationResponseInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A pickup location (retail store, locker, etc.).
 */
class RetailLocationResponse extends SpecObject implements RetailLocationResponseInterface
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
    public function getName(): string
    {
        return $this->get(self::KEY_NAME);
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        return $this->set(self::KEY_NAME, $name);
    }

    /**
     * @return \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface|null
     */
    public function getAddress(): PostalAddressInterface|null
    {
        return $this->get(self::KEY_ADDRESS);
    }

    /**
     * @param \Magebit\UcpSpec\Api\Shopping\Types\PostalAddressInterface|null $address
     * @return self
     */
    public function setAddress(PostalAddressInterface|null $address): self
    {
        return $this->set(self::KEY_ADDRESS, $address);
    }
}
