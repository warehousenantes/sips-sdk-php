<?php

declare(strict_types=1);

namespace Worldline\Sips\Paypage;

use Worldline\Sips\Common\Field\S10TransactionReference;

class PaypageResult
{
    protected $acquirerNativeResponseCode;

    protected $acquirerResponseCode;

    protected $acquirerResponseIdentifier;

    protected $acquirerResponseMessage;

    protected $additionalAuthorisationNumber;

    protected $amount;

    protected $avsAdressResponseCode;

    protected $avsPostcodeResponseCode;

    protected $authorisationId;

    protected $captureDay;

    protected $CaptureLimitData;

    protected $captureMode;

    protected $cardCSCResultCode;

    protected $cardProductCode;

    protected $cardProductName;

    protected $cardProductProfile;

    protected $complementaryCode;

    protected $complementaryInfo;

    protected $creditorId;

    protected $currencyCode;

    protected $customerBusinessName;

    protected $customerCompanyName;

    protected $customerEmail;

    protected $customerId;

    protected $customerIpAddress;

    protected $customerLegalId;

    protected $customerMobilePhone;

    protected $customerPositionOccupied;

    protected $dccAmount;

    protected $dccExchangeRate;

    protected $dccEchangeRateValidity;

    protected $dccProvider;

    protected $dccStatus;

    protected $dccResponseCode;

    protected $guaranteeIndicator;

    protected $hashPan1;

    protected $hashPan2;

    protected $holderAuthentMethod;

    protected $holderAuthentProgram;

    protected $holderAuthentRelegation;

    protected $holderAuthentStatus;

    protected $instalmentAmaountsList;

    protected $instalmentDatesList;

    protected $instalmentNumber;

    protected $instalmentTransactionReferencesList;

    protected $interfaceVersion;

    protected $invoiceReference;

    protected $issuerCode;

    protected $issuerCountryCode;

    protected $issuerEnrollementIndicator;

    protected $issuerWalletInformation;

    protected $keyVersion;

    protected $mandateAuthentMethod;

    protected $mandateCertificationType;

    protected $mandateId;

    protected $mandateUsage;

    protected $maskedPan;

    protected $merchantId;

    protected $merchantSessionId;

    protected $merchantTransactionDataTime;

    protected $merchantWalletId;

    protected $orderChannel;

    protected $orderId;

    protected $panEntryMode;

    protected $panExpireDate;

    protected $paymentAttemptNumber;

    protected $paymentMeanBrand;

    protected $paymentMeanBrandSelectionStatus;

    protected $paymentMeanData;

    protected $paymentMeanId;

    protected $paymentMeanTradingName;

    protected $paymentMeanType;

    protected $paymentMeanPattern;

    protected $preAuthenticationColor;

    protected $preAuthenticationInfo;

    protected $preAuthenticationProfile;

    protected $preAuthenticationProfileValue;

    protected $preAuthenticationRuleResultList;

    protected $preAuthorisationThreshold;

    protected $preAuthenticationValue;

    protected $preAuthorisationProfile;

    protected $preAuthorisationProfileValue;

    protected $preAuthorisationRuleResultList;

    protected $responseCode;

    protected $returnContext;

    protected $s10TransactionId;

    protected $s10TransactionIdDate;

    protected $s10TransactionIdsList;

    protected $scoreColor;

    protected $scoreInfo;

    protected $scoreThreshold;

    protected $scoreValue;

    protected $settlementMode;

    protected $settlementModeComplement;

    protected $statementReference;

    protected $tokenPan;

    protected $transactionActors;

    protected $transactionDateTime;

    protected $transactionOrigin;

    protected $transactionReference;

    /**
     * @var S10TransactionReference
     */
    protected $s10TransactionReference;

    protected $walletType;

    /**
     * PaypageResult constructor.
     */
    public function __construct(string $data)
    {
        $data = explode('|', $data);
        $dataArray = [];
        foreach ($data as $value) {
            $value = explode('=', $value, 2);
            $dataArray[$value[0]] = $value[1];
        }

        foreach ($dataArray as $key => $value) {
            $this->$key = $value;
        }

        if (!empty($this->s10TransactionId)) {
            $this->s10TransactionReference = new S10TransactionReference();
            $this->s10TransactionReference->setS10TransactionId($this->s10TransactionId);
            $this->s10TransactionReference->setS10TransactionIdDate($this->s10TransactionIdDate);
        }
    }

    public function getAcquirerNativeResponseCode(): ?string
    {
        return $this->acquirerNativeResponseCode;
    }

    public function getAcquirerResponseCode(): ?string
    {
        return $this->acquirerResponseCode;
    }

    public function getAcquirerResponseIdentifier(): ?string
    {
        return $this->acquirerResponseIdentifier;
    }

    public function getAcquirerResponseMessage(): ?string
    {
        return $this->acquirerResponseMessage;
    }

    public function getAdditionalAuthorisationNumber(): ?string
    {
        return $this->additionalAuthorisationNumber;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function getAvsAdressResponseCode(): ?string
    {
        return $this->avsAdressResponseCode;
    }

    public function getAvsPostcodeResponseCode(): ?string
    {
        return $this->avsPostcodeResponseCode;
    }

    public function getAuthorisationId(): ?string
    {
        return $this->authorisationId;
    }

    public function getCaptureDay(): ?string
    {
        return $this->captureDay;
    }

    public function getCaptureLimitData(): ?string
    {
        return $this->CaptureLimitData;
    }

    public function getCaptureMode(): ?string
    {
        return $this->captureMode;
    }

    public function getCardCSCResultCode(): ?string
    {
        return $this->cardCSCResultCode;
    }

    public function getCardProductCode(): ?string
    {
        return $this->cardProductCode;
    }

    public function getCardProductName(): ?string
    {
        return $this->cardProductName;
    }

    public function getCardProductProfile(): ?string
    {
        return $this->cardProductProfile;
    }

    public function getComplementaryCode(): ?string
    {
        return $this->complementaryCode;
    }

    /**
     * @return string
     */
    public function getComplementaryInfo(): ?string
    {
        return $this->complementaryInfo;
    }

    public function getCreditorId(): ?string
    {
        return $this->creditorId;
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function getCustomerBusinessName(): ?string
    {
        return $this->customerBusinessName;
    }

    public function getCustomerCompanyName(): ?string
    {
        return $this->customerCompanyName;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function getCustomerIpAddress(): ?string
    {
        return $this->customerIpAddress;
    }

    public function getCustomerLegalId(): ?string
    {
        return $this->customerLegalId;
    }

    public function getCustomerMobilePhone(): ?string
    {
        return $this->customerMobilePhone;
    }

    public function getCustomerPositionOccupied(): ?string
    {
        return $this->customerPositionOccupied;
    }

    public function getDccAmount(): ?string
    {
        return $this->dccAmount;
    }

    public function getDccExchangeRate(): ?string
    {
        return $this->dccExchangeRate;
    }

    public function getDccEchangeRateValidity(): ?string
    {
        return $this->dccEchangeRateValidity;
    }

    public function getDccProvider(): ?string
    {
        return $this->dccProvider;
    }

    public function getDccStatus(): ?string
    {
        return $this->dccStatus;
    }

    public function getDccResponseCode(): ?string
    {
        return $this->dccResponseCode;
    }

    public function getGuaranteeIndicator(): ?string
    {
        return $this->guaranteeIndicator;
    }

    public function getHashPan1(): ?string
    {
        return $this->hashPan1;
    }

    public function getHashPan2(): ?string
    {
        return $this->hashPan2;
    }

    public function getHolderAuthentMethod(): ?string
    {
        return $this->holderAuthentMethod;
    }

    public function getHolderAuthentProgram(): ?string
    {
        return $this->holderAuthentProgram;
    }

    public function getHolderAuthentRelegation(): ?string
    {
        return $this->holderAuthentRelegation;
    }

    public function getHolderAuthentStatus(): ?string
    {
        return $this->holderAuthentStatus;
    }

    public function getInstalmentAmaountsList(): ?string
    {
        return $this->instalmentAmaountsList;
    }

    public function getInstalmentDatesList(): ?string
    {
        return $this->instalmentDatesList;
    }

    public function getInstalmentNumber(): ?string
    {
        return $this->instalmentNumber;
    }

    public function getInstalmentTransactionReferencesList(): ?string
    {
        return $this->instalmentTransactionReferencesList;
    }

    public function getInterfaceVersion(): ?string
    {
        return $this->interfaceVersion;
    }

    public function getInvoiceReference(): ?string
    {
        return $this->invoiceReference;
    }

    public function getIssuerCode(): ?string
    {
        return $this->issuerCode;
    }

    public function getIssuerCountryCode(): ?string
    {
        return $this->issuerCountryCode;
    }

    public function getIssuerEnrollementIndicator(): ?string
    {
        return $this->issuerEnrollementIndicator;
    }

    public function getIssuerWalletInformation(): ?string
    {
        return $this->issuerWalletInformation;
    }

    public function getKeyVersion(): ?string
    {
        return $this->keyVersion;
    }

    public function getMandateAuthentMethod(): ?string
    {
        return $this->mandateAuthentMethod;
    }

    public function getMandateCertificationType(): ?string
    {
        return $this->mandateCertificationType;
    }

    public function getMandateId(): ?string
    {
        return $this->mandateId;
    }

    public function getMandateUsage(): ?string
    {
        return $this->mandateUsage;
    }

    public function getMaskedPan(): ?string
    {
        return $this->maskedPan;
    }

    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    public function getMerchantSessionId(): ?string
    {
        return $this->merchantSessionId;
    }

    public function getMerchantTransactionDataTime(): ?string
    {
        return $this->merchantTransactionDataTime;
    }

    public function getMerchantWalletId(): ?string
    {
        return $this->merchantWalletId;
    }

    public function getOrderChannel(): ?string
    {
        return $this->orderChannel;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getPanEntryMode(): ?string
    {
        return $this->panEntryMode;
    }

    public function getPanExpireDate(): ?string
    {
        return $this->panExpireDate;
    }

    public function getPaymentAttemptNumber(): ?string
    {
        return $this->paymentAttemptNumber;
    }

    public function getPaymentMeanBrand(): ?string
    {
        return $this->paymentMeanBrand;
    }

    public function getPaymentMeanBrandSelectionStatus(): ?string
    {
        return $this->paymentMeanBrandSelectionStatus;
    }

    public function getPaymentMeanData(): ?string
    {
        return $this->paymentMeanData;
    }

    public function getPaymentMeanId(): ?string
    {
        return $this->paymentMeanId;
    }

    public function getPaymentMeanTradingName(): ?string
    {
        return $this->paymentMeanTradingName;
    }

    public function getPaymentMeanType(): ?string
    {
        return $this->paymentMeanType;
    }

    public function getPaymentMeanPattern(): ?string
    {
        return $this->paymentMeanPattern;
    }

    public function getPreAuthenticationColor(): ?string
    {
        return $this->preAuthenticationColor;
    }

    public function getPreAuthenticationInfo(): ?string
    {
        return $this->preAuthenticationInfo;
    }

    public function getPreAuthenticationProfile(): ?string
    {
        return $this->preAuthenticationProfile;
    }

    public function getPreAuthenticationProfileValue(): ?string
    {
        return $this->preAuthenticationProfileValue;
    }

    public function getPreAuthenticationRuleResultList(): ?string
    {
        return $this->preAuthenticationRuleResultList;
    }

    public function getPreAuthorisationThreshold(): ?string
    {
        return $this->preAuthorisationThreshold;
    }

    public function getPreAuthenticationValue(): ?string
    {
        return $this->preAuthenticationValue;
    }

    public function getPreAuthorisationProfile(): ?string
    {
        return $this->preAuthorisationProfile;
    }

    public function getPreAuthorisationProfileValue(): ?string
    {
        return $this->preAuthorisationProfileValue;
    }

    public function getPreAuthorisationRuleResultList(): ?string
    {
        return $this->preAuthorisationRuleResultList;
    }

    public function getResponseCode(): ?string
    {
        return $this->responseCode;
    }

    public function getReturnContext(): ?string
    {
        return $this->returnContext;
    }

    public function getS10TransactionIdsList(): ?string
    {
        return $this->s10TransactionIdsList;
    }

    public function getScoreColor(): ?string
    {
        return $this->scoreColor;
    }

    public function getScoreInfo(): ?string
    {
        return $this->scoreInfo;
    }

    public function getScoreThreshold(): ?string
    {
        return $this->scoreThreshold;
    }

    public function getScoreValue(): ?string
    {
        return $this->scoreValue;
    }

    public function getSettlementMode(): ?string
    {
        return $this->settlementMode;
    }

    public function getSettlementModeComplement(): ?string
    {
        return $this->settlementModeComplement;
    }

    public function getStatementReference(): ?string
    {
        return $this->statementReference;
    }

    public function getTokenPan(): ?string
    {
        return $this->tokenPan;
    }

    public function getTransactionActors(): ?string
    {
        return $this->transactionActors;
    }

    public function getTransactionDateTime(): ?string
    {
        return $this->transactionDateTime;
    }

    public function getTransactionOrigin(): ?string
    {
        return $this->transactionOrigin;
    }

    public function getTransactionReference(): ?string
    {
        return $this->transactionReference;
    }

    public function getWalletType(): ?string
    {
        return $this->walletType;
    }

    public function getS10TransactionReference(): S10TransactionReference
    {
        return $this->s10TransactionReference;
    }

    public function setS10TransactionReference(S10TransactionReference $s10TransactionReference)
    {
        $this->s10TransactionReference = $s10TransactionReference;

        return $this;
    }
}
