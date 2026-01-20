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
 * Buyer object extended with consent tracking.
 *
 * Schema: Buyer with Consent Response
 */
interface BuyerConsentBuyerInterface
{
    /**
     * First name of the buyer.
     *
     * @return string|null
     */
    public function getFirstName(): string|null;

    /**
     * Last name of the buyer.
     *
     * @return string|null
     */
    public function getLastName(): string|null;

    /**
     * Optional, buyer's full name (if first_name or last_name fields are present they take precedence).
     *
     * @return string|null
     */
    public function getFullName(): string|null;

    /**
     * Email of the buyer.
     *
     * @return string|null
     */
    public function getEmail(): string|null;

    /**
     * E.164 standard.
     *
     * @return string|null
     */
    public function getPhoneNumber(): string|null;

    /**
     * Consent tracking fields.
     *
     * @return BuyerConsentConsentInterface|null
     */
    public function getConsent(): BuyerConsentConsentInterface|null;

    /**
     * First name of the buyer.
     *
     * @param string|null $first_name
     * @return self
     */
    public function setFirstName(string|null $first_name): self;

    /**
     * Last name of the buyer.
     *
     * @param string|null $last_name
     * @return self
     */
    public function setLastName(string|null $last_name): self;

    /**
     * Optional, buyer's full name (if first_name or last_name fields are present they take precedence).
     *
     * @param string|null $full_name
     * @return self
     */
    public function setFullName(string|null $full_name): self;

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
     * @param string|null $phone_number
     * @return self
     */
    public function setPhoneNumber(string|null $phone_number): self;

    /**
     * Consent tracking fields.
     *
     * @param BuyerConsentConsentInterface|null $consent
     * @return self
     */
    public function setConsent(BuyerConsentConsentInterface|null $consent): self;
}
