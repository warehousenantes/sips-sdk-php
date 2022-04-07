<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Seal;

class PostSealCalculator
{
    public function isCorrectSeal(string $data, string $secretKey, string $seal): bool
    {
        return $seal === $this->encrypt($data, $secretKey);
    }

    public function encrypt(string $sealdata, string $secretKey): string
    {
        return hash('sha256', $sealdata.$secretKey);
    }
}
