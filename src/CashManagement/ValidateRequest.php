<?php

declare(strict_types=1);

namespace Worldline\Sips\CashManagement;

use Worldline\Sips\Common\SipsEnvironment;
use Worldline\Sips\SipsMessage;

class ValidateRequest extends SipsMessage
{
    protected $currencyCode;

    protected $intermediateServiceProviderId;

    protected $lastRecoveryIndicator;

    protected $operationAmount;

    protected $operationOrigin;

    protected $s10TransactionReference;

    protected $subMerchantAddress;

    protected $subMerchantCategoryCode;

    protected $subMerchantId;

    protected $subMerchantLegalId;

    protected $subMerchantShortName;

    protected $transactionReference;

    public function __construct()
    {
        $this->connecter = SipsEnvironment::OFFICE;
        $this->serviceUrl = 'rs-services/v2/cashManagement/validate';
        $this->interfaceVersion = 'CR_WS_2.3';
        $this->setTransactionReference($this->generateReference());
    }

    public function generateReference(): string
    {
        $microtime = explode(' ', microtime());
        $microtime[0] *= 1_000_000;

        return $microtime[1].$microtime[0];
    }

    public function getOperationAmount()
    {
        return $this->operationAmount;
    }

    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

    public function getOperationOrigin()
    {
        return $this->operationOrigin;
    }

    public function getLastRecoveryIndicator()
    {
        return $this->lastRecoveryIndicator;
    }

    public function getS10TransactionReference()
    {
        return $this->s10TransactionReference;
    }

    public function getIntermediateServiceProviderId()
    {
        return $this->intermediateServiceProviderId;
    }

    public function getSubMerchantId()
    {
        return $this->subMerchantId;
    }

    public function getSubMerchantShortName()
    {
        return $this->subMerchantShortName;
    }

    public function getSubMerchantCategoryCode()
    {
        return $this->subMerchantCategoryCode;
    }

    public function getSubMerchantLegalId()
    {
        return $this->subMerchantLegalId;
    }

    public function getSubMerchantAddress()
    {
        return $this->subMerchantAddress;
    }

    public function setOperationAmount($operationAmount)
    {
        $this->operationAmount = $operationAmount;

        return $this;
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;

        return $this;
    }

    public function setOperationOrigin($operationOrigin)
    {
        $this->operationOrigin = $operationOrigin;

        return $this;
    }

    public function setLastRecoveryIndicator($lastRecoveryIndicator)
    {
        $this->lastRecoveryIndicator = $lastRecoveryIndicator;

        return $this;
    }

    public function setS10TransactionReference($s10TransactionReference)
    {
        $this->s10TransactionReference = $s10TransactionReference;

        return $this;
    }

    public function setIntermediateServiceProviderId($intermediateServiceProviderId)
    {
        $this->intermediateServiceProviderId = $intermediateServiceProviderId;

        return $this;
    }

    public function setSubMerchantId($subMerchantId)
    {
        $this->subMerchantId = $subMerchantId;

        return $this;
    }

    public function setSubMerchantShortName($subMerchantShortName)
    {
        $this->subMerchantShortName = $subMerchantShortName;

        return $this;
    }

    public function setSubMerchantCategoryCode($subMerchantCategoryCode)
    {
        $this->subMerchantCategoryCode = $subMerchantCategoryCode;

        return $this;
    }

    public function setSubMerchantLegalId($subMerchantLegalId)
    {
        $this->subMerchantLegalId = $subMerchantLegalId;

        return $this;
    }

    public function setSubMerchantAddress($subMerchantAddress)
    {
        $this->subMerchantAddress = $subMerchantAddress;

        return $this;
    }
}
