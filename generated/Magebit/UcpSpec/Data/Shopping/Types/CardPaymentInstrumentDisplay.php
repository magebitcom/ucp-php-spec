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

use Magebit\UcpSpec\Api\Shopping\Types\CardPaymentInstrumentDisplayInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * Display information for this card payment instrument.
 */
class CardPaymentInstrumentDisplay extends SpecObject implements CardPaymentInstrumentDisplayInterface
{
    /**
     * @return string|null
     */
    public function getBrand(): string|null
    {
        return $this->get(self::KEY_BRAND);
    }

    /**
     * @param string|null $brand
     * @return self
     */
    public function setBrand(string|null $brand): self
    {
        return $this->set(self::KEY_BRAND, $brand);
    }

    /**
     * @return string|null
     */
    public function getLastDigits(): string|null
    {
        return $this->get(self::KEY_LAST_DIGITS);
    }

    /**
     * @param string|null $lastDigits
     * @return self
     */
    public function setLastDigits(string|null $lastDigits): self
    {
        return $this->set(self::KEY_LAST_DIGITS, $lastDigits);
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
    public function getDescription(): string|null
    {
        return $this->get(self::KEY_DESCRIPTION);
    }

    /**
     * @param string|null $description
     * @return self
     */
    public function setDescription(string|null $description): self
    {
        return $this->set(self::KEY_DESCRIPTION, $description);
    }

    /**
     * @return string|null
     */
    public function getCardArt(): string|null
    {
        return $this->get(self::KEY_CARD_ART);
    }

    /**
     * @param string|null $cardArt
     * @return self
     */
    public function setCardArt(string|null $cardArt): self
    {
        return $this->set(self::KEY_CARD_ART, $cardArt);
    }
}
