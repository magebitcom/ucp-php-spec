<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Discovery;

interface UCPDiscoveryProfileSigningKeysItemInterface
{
    public const USE_SIG = 'sig';
    public const USE_ENC = 'enc';

    /**
     * Key ID. Referenced in signature headers to identify which key to use for verification.
     *
     * @return string
     */
    public function getKid(): string;

    /**
     * Key type (e.g., 'EC', 'RSA').
     *
     * @return string
     */
    public function getKty(): string;

    /**
     * Curve name for EC keys (e.g., 'P-256').
     *
     * @return string|null
     */
    public function getCrv(): string|null;

    /**
     * X coordinate for EC public keys (base64url encoded).
     *
     * @return string|null
     */
    public function getX(): string|null;

    /**
     * Y coordinate for EC public keys (base64url encoded).
     *
     * @return string|null
     */
    public function getY(): string|null;

    /**
     * Modulus for RSA public keys (base64url encoded).
     *
     * @return string|null
     */
    public function getN(): string|null;

    /**
     * Exponent for RSA public keys (base64url encoded).
     *
     * @return string|null
     */
    public function getE(): string|null;

    /**
     * Key usage. Should be 'sig' for signing keys.
     *
     * @return string|null
     */
    public function getUse(): string|null;

    /**
     * Algorithm (e.g., 'ES256', 'RS256').
     *
     * @return string|null
     */
    public function getAlg(): string|null;

    /**
     * Key ID. Referenced in signature headers to identify which key to use for verification.
     *
     * @param string $kid
     * @return self
     */
    public function setKid(string $kid): self;

    /**
     * Key type (e.g., 'EC', 'RSA').
     *
     * @param string $kty
     * @return self
     */
    public function setKty(string $kty): self;

    /**
     * Curve name for EC keys (e.g., 'P-256').
     *
     * @param string|null $crv
     * @return self
     */
    public function setCrv(string|null $crv): self;

    /**
     * X coordinate for EC public keys (base64url encoded).
     *
     * @param string|null $x
     * @return self
     */
    public function setX(string|null $x): self;

    /**
     * Y coordinate for EC public keys (base64url encoded).
     *
     * @param string|null $y
     * @return self
     */
    public function setY(string|null $y): self;

    /**
     * Modulus for RSA public keys (base64url encoded).
     *
     * @param string|null $n
     * @return self
     */
    public function setN(string|null $n): self;

    /**
     * Exponent for RSA public keys (base64url encoded).
     *
     * @param string|null $e
     * @return self
     */
    public function setE(string|null $e): self;

    /**
     * Key usage. Should be 'sig' for signing keys.
     *
     * @param string|null $use
     * @return self
     */
    public function setUse(string|null $use): self;

    /**
     * Algorithm (e.g., 'ES256', 'RS256').
     *
     * @param string|null $alg
     * @return self
     */
    public function setAlg(string|null $alg): self;
}
