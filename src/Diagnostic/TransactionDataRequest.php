<?php

declare(strict_types=1);

namespace Worldline\Sips\Diagnostic;

use Worldline\Sips\Common\SipsEnvironment;
use Worldline\Sips\SipsMessage;

/**
 * Description of TransactionData.
 *
 * @author guiled
 */
class TransactionDataRequest extends SipsMessage
{
    protected $transactionReference;

    protected $s10TransactionReference;

    protected $intermediateServiceProviderId;

    public function __construct()
    {
        $this->connecter = SipsEnvironment::OFFICE;
        $this->serviceUrl = 'rs-services/v2/diagnostic/getTransactionData';
        $this->interfaceVersion = 'DR_WS_2.23';
    }

    public function getTransactionReference()
    {
        return $this->transactionReference;
    }

    public function getS10TransactionReference()
    {
        return $this->s10TransactionReference;
    }

    public function getIntermediateServiceProviderId()
    {
        return $this->intermediateServiceProviderId;
    }

    public function setTransactionReference($transactionReference)
    {
        $this->transactionReference = $transactionReference;

        return $this;
    }

    public function setS10TransactionReference($s10TransactionReference)
    {
        unset($this->transactionReference);
        $this->s10TransactionReference = $s10TransactionReference;

        return $this;
    }

    public function setIntermediateServiceProviderId($intermediateServiceProviderId)
    {
        $this->intermediateServiceProviderId = $intermediateServiceProviderId;

        return $this;
    }
}
