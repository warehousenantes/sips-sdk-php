<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

class S10TransactionReference extends Field
{
    protected $s10TransactionId;

    protected $s10TransactionIdDate;

    public function getS10TransactionId()
    {
        return $this->s10TransactionId;
    }

    public function getS10TransactionIdDate()
    {
        return $this->s10TransactionIdDate;
    }

    public function setS10TransactionId($s10TransactionId)
    {
        $this->s10TransactionId = $s10TransactionId;

        return $this;
    }

    public function setS10TransactionIdDate($s10TransactionIdDate)
    {
        $this->s10TransactionIdDate = $s10TransactionIdDate;

        return $this;
    }
}
