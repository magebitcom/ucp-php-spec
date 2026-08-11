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

use Magebit\UcpSpec\Api\Shopping\Types\CardCredentialInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * A card credential containing sensitive payment card details including raw Primary Account Numbers (PANs). This credential type MUST NOT be used for checkout, only with payment handlers that tokenize or encrypt credentials. CRITICAL: Both parties handling CardCredential (sender and receiver) MUST be PCI DSS compliant. Transmission MUST use HTTPS/TLS with strong cipher suites.
 */
class CardCredential extends SpecObject implements CardCredentialInterface
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
    public function getCardNumberType(): string
    {
        return $this->get(self::KEY_CARD_NUMBER_TYPE);
    }

    /**
     * @param string $cardNumberType
     * @return self
     */
    public function setCardNumberType(string $cardNumberType): self
    {
        return $this->set(self::KEY_CARD_NUMBER_TYPE, $cardNumberType);
    }

    /**
     * @return string|null
     */
    public function getNumber(): string|null
    {
        return $this->get(self::KEY_NUMBER);
    }

    /**
     * @param string|null $number
     * @return self
     */
    public function setNumber(string|null $number): self
    {
        return $this->set(self::KEY_NUMBER, $number);
    }

    /**
     * @return int|null
     */
    public function getExpiryMonth(): int|null
    {
        return $this->get(self::KEY_EXPIRY_MONTH);
    }

    /**
     * @param int|null $expiryMonth
     * @return self
     */
    public function setExpiryMonth(int|null $expiryMonth): self
    {
        return $this->set(self::KEY_EXPIRY_MONTH, $expiryMonth);
    }

    /**
     * @return int|null
     */
    public function getExpiryYear(): int|null
    {
        return $this->get(self::KEY_EXPIRY_YEAR);
    }

    /**
     * @param int|null $expiryYear
     * @return self
     */
    public function setExpiryYear(int|null $expiryYear): self
    {
        return $this->set(self::KEY_EXPIRY_YEAR, $expiryYear);
    }

    /**
     * @return string|null
     */
    public function getName(): string|null
    {
        return $this->get(self::KEY_NAME);
    }

    /**
     * @param string|null $name
     * @return self
     */
    public function setName(string|null $name): self
    {
        return $this->set(self::KEY_NAME, $name);
    }

    /**
     * @return string|null
     */
    public function getCvc(): string|null
    {
        return $this->get(self::KEY_CVC);
    }

    /**
     * @param string|null $cvc
     * @return self
     */
    public function setCvc(string|null $cvc): self
    {
        return $this->set(self::KEY_CVC, $cvc);
    }

    /**
     * @return string|null
     */
    public function getCryptogram(): string|null
    {
        return $this->get(self::KEY_CRYPTOGRAM);
    }

    /**
     * @param string|null $cryptogram
     * @return self
     */
    public function setCryptogram(string|null $cryptogram): self
    {
        return $this->set(self::KEY_CRYPTOGRAM, $cryptogram);
    }

    /**
     * @return string|null
     */
    public function getEciValue(): string|null
    {
        return $this->get(self::KEY_ECI_VALUE);
    }

    /**
     * @param string|null $eciValue
     * @return self
     */
    public function setEciValue(string|null $eciValue): self
    {
        return $this->set(self::KEY_ECI_VALUE, $eciValue);
    }
}
