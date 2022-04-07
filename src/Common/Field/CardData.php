<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

class CardData extends Field
{
    /**
     * Network name associated with the card.
     */
    protected ?string $cardScheme = null;

    /**
     * Name of the payment method that is used. It is related to one paymentMeanType.
     */
    protected ?string $cardBrand = null;

    /**
     * Product code of the card.
     */
    protected ?string $cardProductCode = null;

    /**
     * Product name of the card.
     */
    protected ?string $cardProductName = null;

    /**
     * Indicates whether the card is an Enterprise / Commercial card or not.
     */
    protected ?string $cardCorporateIndicator = null;

    /**
     * Indicator of existence of a card effective date (Y/N/Empty).
     */
    protected ?string $cardEffectiveDateIndicator = null;

    /**
     * Indicator of existence of an issue number.
     */
    protected ?string $cardSeqNumberIndicator = null;

    /**
     * Issuer code of the card.
     */
    protected ?string $issuerCode = null;

    /**
     * Issuer name of the card.
     */
    protected string $issuerName;

    /**
     * Country code of the card issuer.
     */
    protected ?string $issuerCountryCode = null;

    /**
     * region code of the card issuer.
     */
    protected ?string $issuerRegionCode = null;

    /**
     * Minimal length of the PAN.
     */
    protected ?int $panLengthMin = null;

    /**
     * Maximum length of the PAN.
     */
    protected ?int $panLengthMax = null;

    /**
     * Control algorithm applied on the PAN (L/V/N/Empty).
     */
    protected ?string $panCheckAlgorithm = null;

    /**
     * Profile code of the card.
     */
    protected ?string $cardProductProfile = null;

    /**
     * Indicates whether the card is a virtual card.
     */
    protected ?string $virtualCardIndicator = null;

    /**
     * Profile name of the card which is displayed on payment electronic ticket in accordance with MPADS requirements.
     */
    protected ?string $cardProductUsageLabel = null;

    /**
     * Get network name associated with the card.
     *
     * @return string
     */
    public function getCardScheme()
    {
        return $this->cardScheme;
    }

    /**
     * Set network name associated with the card.
     *
     * @param string $cardScheme network name associated with the card
     *
     * @return self
     */
    public function setCardScheme(string $cardScheme)
    {
        $this->cardScheme = $cardScheme;

        return $this;
    }

    /**
     * Get name of the payment method that is used. It is related to one paymentMeanType.
     *
     * @return string
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /**
     * Set name of the payment method that is used. It is related to one paymentMeanType.
     *
     * @param string $cardBrand Name of the payment method that is used. It is related to one paymentMeanType.
     *
     * @return self
     */
    public function setCardBrand(string $cardBrand)
    {
        $this->cardBrand = $cardBrand;

        return $this;
    }

    /**
     * Get product code of the card.
     *
     * @return string
     */
    public function getCardProductCode()
    {
        return $this->cardProductCode;
    }

    /**
     * Set product code of the card.
     *
     * @param string $cardProductCode product code of the card
     *
     * @return self
     */
    public function setCardProductCode(string $cardProductCode)
    {
        $this->cardProductCode = $cardProductCode;

        return $this;
    }

    /**
     * Get product name of the card.
     *
     * @return string
     */
    public function getCardProductName()
    {
        return $this->cardProductName;
    }

    /**
     * Set product name of the card.
     *
     * @param string $cardProductName product name of the card
     *
     * @return self
     */
    public function setCardProductName(string $cardProductName)
    {
        $this->cardProductName = $cardProductName;

        return $this;
    }

    /**
     * Get indicates whether the card is an Enterprise / Commercial card or not.
     *
     * @return string
     */
    public function getCardCorporateIndicator()
    {
        return $this->cardCorporateIndicator;
    }

    /**
     * Set indicates whether the card is an Enterprise / Commercial card or not.
     *
     * @param string $cardCorporateIndicator indicates whether the card is an Enterprise / Commercial card or not
     *
     * @return self
     */
    public function setCardCorporateIndicator(string $cardCorporateIndicator)
    {
        $this->cardCorporateIndicator = $cardCorporateIndicator;

        return $this;
    }

    /**
     * Get indicator of existence of a card effective date (Y/N/Empty).
     *
     * @return string
     */
    public function getCardEffectiveDateIndicator()
    {
        return $this->cardEffectiveDateIndicator;
    }

    /**
     * Set indicator of existence of a card effective date (Y/N/Empty).
     *
     * @param string $cardEffectiveDateIndicator Indicator of existence of a card effective date (Y/N/Empty)
     *
     * @return self
     */
    public function setCardEffectiveDateIndicator(string $cardEffectiveDateIndicator)
    {
        $this->cardEffectiveDateIndicator = $cardEffectiveDateIndicator;

        return $this;
    }

    /**
     * Get indicator of existence of an issue number.
     *
     * @return string
     */
    public function getCardSeqNumberIndicator()
    {
        return $this->cardSeqNumberIndicator;
    }

    /**
     * Set indicator of existence of an issue number.
     *
     * @param string $cardSeqNumberIndicator Indicator of existence of an issue number
     *
     * @return self
     */
    public function setCardSeqNumberIndicator(string $cardSeqNumberIndicator)
    {
        $this->cardSeqNumberIndicator = $cardSeqNumberIndicator;

        return $this;
    }

    /**
     * Get issuer code of the card.
     *
     * @return string
     */
    public function getIssuerCode()
    {
        return $this->issuerCode;
    }

    /**
     * Set issuer code of the card.
     *
     * @param string $issuerCode Issuer code of the card
     *
     * @return self
     */
    public function setIssuerCode(string $issuerCode)
    {
        $this->issuerCode = $issuerCode;

        return $this;
    }

    /**
     * Get country code of the card issuer.
     *
     * @return string
     */
    public function getIssuerCountryCode()
    {
        return $this->issuerCountryCode;
    }

    /**
     * Set country code of the card issuer.
     *
     * @param string $issuerCountryCode Country code of the card issuer
     *
     * @return self
     */
    public function setIssuerCountryCode(string $issuerCountryCode)
    {
        $this->issuerCountryCode = $issuerCountryCode;

        return $this;
    }

    /**
     * Get region code of the card issuer.
     *
     * @return string
     */
    public function getIssuerRegionCode()
    {
        return $this->issuerRegionCode;
    }

    /**
     * Set region code of the card issuer.
     *
     * @param string $issuerRegionCode region code of the card issuer
     *
     * @return self
     */
    public function setIssuerRegionCode(string $issuerRegionCode)
    {
        $this->issuerRegionCode = $issuerRegionCode;

        return $this;
    }

    /**
     * Get minimal length of the PAN.
     *
     * @return int
     */
    public function getPanLengthMin()
    {
        return $this->panLengthMin;
    }

    /**
     * Set minimal length of the PAN.
     *
     * @param int $panLengthMin Minimal length of the PAN
     *
     * @return self
     */
    public function setPanLengthMin(int $panLengthMin)
    {
        $this->panLengthMin = $panLengthMin;

        return $this;
    }

    /**
     * Get maximum length of the PAN.
     *
     * @return int
     */
    public function getPanLengthMax()
    {
        return $this->panLengthMax;
    }

    /**
     * Set maximum length of the PAN.
     *
     * @param int $panLengthMax Maximum length of the PAN
     *
     * @return self
     */
    public function setPanLengthMax(int $panLengthMax)
    {
        $this->panLengthMax = $panLengthMax;

        return $this;
    }

    /**
     * Get control algorithm applied on the PAN (L/V/N/Empty).
     *
     * @return string
     */
    public function getPanCheckAlgorithm()
    {
        return $this->panCheckAlgorithm;
    }

    /**
     * Set control algorithm applied on the PAN (L/V/N/Empty).
     *
     * @param string $panCheckAlgorithm Control algorithm applied on the PAN (L/V/N/Empty)
     *
     * @return self
     */
    public function setPanCheckAlgorithm(string $panCheckAlgorithm)
    {
        $this->panCheckAlgorithm = $panCheckAlgorithm;

        return $this;
    }

    /**
     * Get profile code of the card.
     *
     * @return string
     */
    public function getCardProductProfile()
    {
        return $this->cardProductProfile;
    }

    /**
     * Set profile code of the card.
     *
     * @param string $cardProductProfile profile code of the card
     *
     * @return self
     */
    public function setCardProductProfile(string $cardProductProfile)
    {
        $this->cardProductProfile = $cardProductProfile;

        return $this;
    }

    /**
     * Get indicates whether the card is a virtual card.
     *
     * @return string
     */
    public function getVirtualCardIndicator()
    {
        return $this->virtualCardIndicator;
    }

    /**
     * Set indicates whether the card is a virtual card.
     *
     * @param string $virtualCardIndicator Indicates whether the card is a virtual card
     *
     * @return self
     */
    public function setVirtualCardIndicator(string $virtualCardIndicator)
    {
        $this->virtualCardIndicator = $virtualCardIndicator;

        return $this;
    }

    /**
     * Get profile name of the card which is displayed on payment electronic ticket in accordance with MPADS requirements.
     *
     * @return string
     */
    public function getCardProductUsageLabel()
    {
        return $this->cardProductUsageLabel;
    }

    /**
     * Set profile name of the card which is displayed on payment electronic ticket in accordance with MPADS requirements.
     *
     * @param string $cardProductUsageLabel profile name of the card which is displayed on payment electronic ticket in accordance with MPADS requirements
     *
     * @return self
     */
    public function setCardProductUsageLabel(string $cardProductUsageLabel)
    {
        $this->cardProductUsageLabel = $cardProductUsageLabel;

        return $this;
    }
}
