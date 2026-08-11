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

use Magebit\UcpSpec\Api\Shopping\BuyerConsentCreateRequestConsentInterface;
use Magebit\UcpSpec\Runtime\SpecObject;

/**
 * User consent states for data processing
 */
class BuyerConsentCreateRequestConsent extends SpecObject implements BuyerConsentCreateRequestConsentInterface
{
    /**
     * @return bool|null
     */
    public function getAnalytics(): bool|null
    {
        return $this->get(self::KEY_ANALYTICS);
    }

    /**
     * @param bool|null $analytics
     * @return self
     */
    public function setAnalytics(bool|null $analytics): self
    {
        return $this->set(self::KEY_ANALYTICS, $analytics);
    }

    /**
     * @return bool|null
     */
    public function getPreferences(): bool|null
    {
        return $this->get(self::KEY_PREFERENCES);
    }

    /**
     * @param bool|null $preferences
     * @return self
     */
    public function setPreferences(bool|null $preferences): self
    {
        return $this->set(self::KEY_PREFERENCES, $preferences);
    }

    /**
     * @return bool|null
     */
    public function getMarketing(): bool|null
    {
        return $this->get(self::KEY_MARKETING);
    }

    /**
     * @param bool|null $marketing
     * @return self
     */
    public function setMarketing(bool|null $marketing): self
    {
        return $this->set(self::KEY_MARKETING, $marketing);
    }

    /**
     * @return bool|null
     */
    public function getSaleOfData(): bool|null
    {
        return $this->get(self::KEY_SALE_OF_DATA);
    }

    /**
     * @param bool|null $saleOfData
     * @return self
     */
    public function setSaleOfData(bool|null $saleOfData): self
    {
        return $this->set(self::KEY_SALE_OF_DATA, $saleOfData);
    }
}
