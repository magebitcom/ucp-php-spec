<?php

/**
 * This file is auto-generated. Do not edit manually.
 *
 * @author    Magebit <info@magebit.com>
 * @copyright Copyright (c) Magebit, Ltd. (https://magebit.com)
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\UcpSpec\Api\Shopping;

/**
 * Buyer object extended with consent tracking.
 *
 * Schema: Buyer with Consent Complete Request
 */
interface BuyerConsentCompleteRequestBuyerInterface
{
    public const KEY_FIRST_NAME = 'first_name';
    public const KEY_LAST_NAME = 'last_name';
    public const KEY_EMAIL = 'email';
    public const KEY_PHONE_NUMBER = 'phone_number';
    public const KEY_CONSENT = 'consent';

    /**
     * First name of the buyer.
     *
     * @return string|null
     */
    public function getFirstName(): string|null;

    /**
     * First name of the buyer.
     *
     * @param string|null $firstName
     * @return self
     */
    public function setFirstName(string|null $firstName): self;

    /**
     * Last name of the buyer.
     *
     * @return string|null
     */
    public function getLastName(): string|null;

    /**
     * Last name of the buyer.
     *
     * @param string|null $lastName
     * @return self
     */
    public function setLastName(string|null $lastName): self;

    /**
     * Email of the buyer.
     *
     * @return string|null
     */
    public function getEmail(): string|null;

    /**
     * Email of the buyer.
     *
     * @param string|null $email
     * @return self
     */
    public function setEmail(string|null $email): self;

    /**
     * E.164 standard.
     *
     * @return string|null
     */
    public function getPhoneNumber(): string|null;

    /**
     * E.164 standard.
     *
     * @param string|null $phoneNumber
     * @return self
     */
    public function setPhoneNumber(string|null $phoneNumber): self;

    /**
     * Consent tracking fields.
     *
     * @return \Magebit\UcpSpec\Api\Shopping\BuyerConsentCompleteRequestConsentInterface|null
     */
    public function getConsent(): BuyerConsentCompleteRequestConsentInterface|null;

    /**
     * Consent tracking fields.
     *
     * @param \Magebit\UcpSpec\Api\Shopping\BuyerConsentCompleteRequestConsentInterface|null $consent
     * @return self
     */
    public function setConsent(BuyerConsentCompleteRequestConsentInterface|null $consent): self;
}
