<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\MutableApi\Schemas\Shopping;

/**
 * User consent states for data processing
 */
interface BuyerConsentConsentInterface
{
    public const KEY_ANALYTICS = 'analytics';
    public const KEY_PREFERENCES = 'preferences';
    public const KEY_MARKETING = 'marketing';
    public const KEY_SALE_OF_DATA = 'sale_of_data';

    /**
     * Consent for analytics and performance tracking.
     *
     * @return bool|null
     */
    public function getAnalytics(): bool|null;

    /**
     * Consent for storing user preferences.
     *
     * @return bool|null
     */
    public function getPreferences(): bool|null;

    /**
     * Consent for marketing communications.
     *
     * @return bool|null
     */
    public function getMarketing(): bool|null;

    /**
     * Consent for selling data to third parties (CCPA).
     *
     * @return bool|null
     */
    public function getSaleOfData(): bool|null;

    /**
     * Consent for analytics and performance tracking.
     *
     * @param bool|null $analytics
     * @return self
     */
    public function setAnalytics(?bool $analytics): self;

    /**
     * Consent for storing user preferences.
     *
     * @param bool|null $preferences
     * @return self
     */
    public function setPreferences(?bool $preferences): self;

    /**
     * Consent for marketing communications.
     *
     * @param bool|null $marketing
     * @return self
     */
    public function setMarketing(?bool $marketing): self;

    /**
     * Consent for selling data to third parties (CCPA).
     *
     * @param bool|null $saleOfData
     * @return self
     */
    public function setSaleOfData(?bool $saleOfData): self;
}
