<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

/**
 * @author Guiled <guislain.duthieuw@gmail.com>
 */
class WalletPaymentMeanData extends Field
{
    protected ?int $paymentMeanId = null;

    protected ?string $maskedPan = null;

    protected ?string $paymentMeanAlias = null;

    /**
     * Format YYYYMM.
     */
    protected ?int $panExpiryDate = null;

    protected ?string $paymentMeanBrand = null;

    /**
     * Indicates the players in the transaction.
     * Values: BTOB, BTOC, BTOF.
     */
    protected ?string $transactionActors = null;

    protected ?\Worldline\Sips\Common\PspData $pspData = null;

    protected ?string $mandateId = null;

    /**
     * Identifier provided by issuer wallet to identify a payment mean.
     */
    protected ?string $issuerWalletId = null;

    /**
     * Can be "Paylib".
     */
    protected ?string $issuerWalletType = null;

    public function __construct($data)
    {
        foreach ($data as $name => $value) {
            if ('pspData' === $name) {
                $value = new PspData($value);
            }

            $this->$name = $value;
        }
    }

    public function getPaymentMeanId()
    {
        return $this->paymentMeanId;
    }

    public function getMaskedPan()
    {
        return $this->maskedPan;
    }

    public function getPaymentMeanAlias()
    {
        return $this->paymentMeanAlias;
    }

    public function getPanExpiryDate()
    {
        return $this->panExpiryDate;
    }

    public function getPaymentMeanBrand()
    {
        return $this->paymentMeanBrand;
    }

    public function getTransactionActors()
    {
        return $this->transactionActors;
    }

    public function getPspData(): Worldline\Sips\Common\PspData
    {
        return $this->pspData;
    }

    public function getMandateId()
    {
        return $this->mandateId;
    }

    public function getIssuerWalletId()
    {
        return $this->issuerWalletId;
    }

    public function getIssuerWalletType()
    {
        return $this->issuerWalletType;
    }

    public function setPaymentMeanId($paymentMeanId)
    {
        $this->paymentMeanId = $paymentMeanId;

        return $this;
    }

    public function setMaskedPan($maskedPan)
    {
        $this->maskedPan = $maskedPan;

        return $this;
    }

    public function setPaymentMeanAlias($paymentMeanAlias)
    {
        $this->paymentMeanAlias = $paymentMeanAlias;

        return $this;
    }

    public function setPanExpiryDate($panExpiryDate)
    {
        $this->panExpiryDate = $panExpiryDate;

        return $this;
    }

    public function setPaymentMeanBrand($paymentMeanBrand)
    {
        $this->paymentMeanBrand = $paymentMeanBrand;

        return $this;
    }

    public function setTransactionActors($transactionActors)
    {
        $this->transactionActors = $transactionActors;

        return $this;
    }

    public function setPspData(Worldline\Sips\Common\PspData $pspData)
    {
        $this->pspData = $pspData;

        return $this;
    }

    public function setMandateId($mandateId)
    {
        $this->mandateId = $mandateId;

        return $this;
    }

    public function setIssuerWalletId($issuerWalletId)
    {
        $this->issuerWalletId = $issuerWalletId;

        return $this;
    }

    public function setIssuerWalletType($issuerWalletType)
    {
        $this->issuerWalletType = $issuerWalletType;

        return $this;
    }
}
