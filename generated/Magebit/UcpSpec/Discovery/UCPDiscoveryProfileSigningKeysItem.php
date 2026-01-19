<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Discovery;

interface UCPDiscoveryProfileSigningKeysItem
{
    /**
     * Key ID. Referenced in signature headers to identify which key to use for verification.
     *
     * @return string
     */
    function getKid(): string;

    /**
     * Key type (e.g., 'EC', 'RSA').
     *
     * @return string
     */
    function getKty(): string;

    /**
     * Curve name for EC keys (e.g., 'P-256').
     *
     * @return string|null
     */
    function getCrv(): string|null;

    /**
     * X coordinate for EC public keys (base64url encoded).
     *
     * @return string|null
     */
    function getX(): string|null;

    /**
     * Y coordinate for EC public keys (base64url encoded).
     *
     * @return string|null
     */
    function getY(): string|null;

    /**
     * Modulus for RSA public keys (base64url encoded).
     *
     * @return string|null
     */
    function getN(): string|null;

    /**
     * Exponent for RSA public keys (base64url encoded).
     *
     * @return string|null
     */
    function getE(): string|null;

    /**
     * Key usage. Should be 'sig' for signing keys.
     *
     * @return string|null
     */
    function getUse(): string|null;

    /**
     * Algorithm (e.g., 'ES256', 'RS256').
     *
     * @return string|null
     */
    function getAlg(): string|null;
}
