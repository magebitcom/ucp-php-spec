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
    public function setAnalytics(bool|null $analytics): self;

    /**
     * Consent for storing user preferences.
     *
     * @param bool|null $preferences
     * @return self
     */
    public function setPreferences(bool|null $preferences): self;

    /**
     * Consent for marketing communications.
     *
     * @param bool|null $marketing
     * @return self
     */
    public function setMarketing(bool|null $marketing): self;

    /**
     * Consent for selling data to third parties (CCPA).
     *
     * @param bool|null $sale_of_data
     * @return self
     */
    public function setSaleOfData(bool|null $sale_of_data): self;
}
