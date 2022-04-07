<?php

declare(strict_types=1);

namespace Worldline\Sips\Checkout;

class CardCheckEnrollmentResponse extends CheckEnrollmentResponse
{
    protected $paymentMeanBrandSelectionStatus;

    protected $maskedPan;

    protected $tokenPan;

    public function getPaymentMeanBrandSelectionStatus()
    {
        return $this->paymentMeanBrandSelectionStatus;
    }

    public function getMaskedPan()
    {
        return $this->maskedPan;
    }

    public function getTokenPan()
    {
        return $this->tokenPan;
    }
}
