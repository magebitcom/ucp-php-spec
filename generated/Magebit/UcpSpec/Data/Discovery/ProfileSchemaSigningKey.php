<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Data\Discovery;

use Magebit\UcpSpec\Api\Discovery\ProfileSchemaSigningKeyInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Public key for signature verification in JWK format.
 */
class ProfileSchemaSigningKey extends SpecObject implements ProfileSchemaSigningKeyInterface
{
    /**
     * @return string
     */
    public function getKid(): string
    {
        return $this->get(self::KEY_KID);
    }

    /**
     * @param string $kid
     * @return self
     */
    public function setKid(string $kid): self
    {
        return $this->set(self::KEY_KID, $kid);
    }

    /**
     * @return string
     */
    public function getKty(): string
    {
        return $this->get(self::KEY_KTY);
    }

    /**
     * @param string $kty
     * @return self
     */
    public function setKty(string $kty): self
    {
        return $this->set(self::KEY_KTY, $kty);
    }

    /**
     * @return string|null
     */
    public function getCrv(): string|null
    {
        return $this->get(self::KEY_CRV);
    }

    /**
     * @param string|null $crv
     * @return self
     */
    public function setCrv(string|null $crv): self
    {
        return $this->set(self::KEY_CRV, $crv);
    }

    /**
     * @return string|null
     */
    public function getX(): string|null
    {
        return $this->get(self::KEY_X);
    }

    /**
     * @param string|null $x
     * @return self
     */
    public function setX(string|null $x): self
    {
        return $this->set(self::KEY_X, $x);
    }

    /**
     * @return string|null
     */
    public function getY(): string|null
    {
        return $this->get(self::KEY_Y);
    }

    /**
     * @param string|null $y
     * @return self
     */
    public function setY(string|null $y): self
    {
        return $this->set(self::KEY_Y, $y);
    }

    /**
     * @return string|null
     */
    public function getN(): string|null
    {
        return $this->get(self::KEY_N);
    }

    /**
     * @param string|null $n
     * @return self
     */
    public function setN(string|null $n): self
    {
        return $this->set(self::KEY_N, $n);
    }

    /**
     * @return string|null
     */
    public function getE(): string|null
    {
        return $this->get(self::KEY_E);
    }

    /**
     * @param string|null $e
     * @return self
     */
    public function setE(string|null $e): self
    {
        return $this->set(self::KEY_E, $e);
    }

    /**
     * @return string|null
     */
    public function getUse(): string|null
    {
        return $this->get(self::KEY_USE);
    }

    /**
     * @param string|null $use
     * @return self
     */
    public function setUse(string|null $use): self
    {
        return $this->set(self::KEY_USE, $use);
    }

    /**
     * @return string|null
     */
    public function getAlg(): string|null
    {
        return $this->get(self::KEY_ALG);
    }

    /**
     * @param string|null $alg
     * @return self
     */
    public function setAlg(string|null $alg): self
    {
        return $this->set(self::KEY_ALG, $alg);
    }
}
