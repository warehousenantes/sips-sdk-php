<?php

declare(strict_types=1);

namespace Worldline\Sips\Wallet;

use Worldline\Sips\Common\Field\WalletPaymentMeanData;

class GetWalletDataResponse
{
    protected $walletCreationDateTime;

    protected $walletLastActionDateTime;

    protected $walletResponseCode;

    protected array $walletPaymentMeanDataList = [];

    // List of container walletPaymentMeanData . See the Containers part
    protected $errorFieldName;

    //	Available if walletResponseCode 12 or 30

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            if ('walletPaymentMeanDataList' === $key) {
                $result = [];
                foreach ($value as $walletPaymentMeanData) {
                    $result[] = new WalletPaymentMeanData($walletPaymentMeanData);
                }

                $value = $result;
            }

            $this->$key = $value;
        }
    }

    public function getWalletCreationDateTime()
    {
        return $this->walletCreationDateTime;
    }

    public function getWalletLastActionDateTime()
    {
        return $this->walletLastActionDateTime;
    }

    public function getWalletResponseCode()
    {
        return $this->walletResponseCode;
    }

    public function getWalletPaymentMeanDataList()
    {
        return $this->walletPaymentMeanDataList;
    }

    public function getErrorFieldName()
    {
        return $this->errorFieldName;
    }

    public function setWalletCreationDateTime($walletCreationDateTime)
    {
        $this->walletCreationDateTime = $walletCreationDateTime;

        return $this;
    }

    public function setWalletLastActionDateTime($walletLastActionDateTime)
    {
        $this->walletLastActionDateTime = $walletLastActionDateTime;

        return $this;
    }

    public function setWalletResponseCode($walletResponseCode)
    {
        $this->walletResponseCode = $walletResponseCode;

        return $this;
    }

    public function setWalletPaymentMeanDataList($walletPaymentMeanDataList)
    {
        $this->walletPaymentMeanDataList = $walletPaymentMeanDataList;

        return $this;
    }

    public function setErrorFieldName($errorFieldName)
    {
        $this->errorFieldName = $errorFieldName;

        return $this;
    }
}
