<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Schemas\Shopping;

/**
 * User consent states for data processing
 */
interface Consent
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
}
