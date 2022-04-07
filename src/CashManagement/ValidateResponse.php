<?php

declare(strict_types=1);

namespace Worldline\Sips\CashManagement;

class ValidateResponse
{
    protected $acquirerResponseCode;
    protected $authorisationId;
    protected $newAmount;
    protected $newStatus;
    protected $operationDateTime;
    protected $responseCode;
    protected $captureLimitDate;
    protected $seal;
    protected $errorFieldName;

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getAcquirerResponseCode()
    {
        return $this->acquirerResponseCode;
    }

    public function getAuthorisationId()
    {
        return $this->authorisationId;
    }

    public function getNewAmount()
    {
        return $this->newAmount;
    }

    public function getNewStatus()
    {
        return $this->newStatus;
    }

    public function getOperationDateTime()
    {
        return $this->operationDateTime;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function getCaptureLimitDate()
    {
        return $this->captureLimitDate;
    }

    public function getSeal()
    {
        return $this->seal;
    }

    public function getErrorFieldName()
    {
        return $this->errorFieldName;
    }
}
