<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Field;

class PaypageData extends Field
{
    protected $bypassReceiptPage;

    public function getBypassReceiptPage(): ?bool
    {
        return 'true' === $this->bypassReceiptPage;
    }

    public function setBypassReceiptPage(bool $bypassReceiptPage): self
    {
        $this->bypassReceiptPage = $bypassReceiptPage ? 'true' : 'false';

        return $this;
    }
}
