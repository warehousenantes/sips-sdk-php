<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

class PaypageData extends Field
{
    protected $bypassReceiptPage;

    public function getBypassReceiptPage(): ?bool
    {
        if ('true' === $this->bypassReceiptPage) {
            return true;
        }

        return false;
    }

    public function setBypassReceiptPage(bool $bypassReceiptPage): self
    {
        if ($bypassReceiptPage) {
            $this->bypassReceiptPage = 'true';
        } else {
            $this->bypassReceiptPage = 'false';
        }

        return $this;
    }
}
