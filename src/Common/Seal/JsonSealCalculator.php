<?php

declare(strict_types=1);

namespace Worldline\Sips\Common\Seal;

use Worldline\Sips\Paypage\InitializationResponse;
use Worldline\Sips\SipsMessage;

/**
 * @see \Worldline\Sips\Test\Common\Seal\JsonSealCalculatorTest
 */
class JsonSealCalculator
{
    /**
     * @var string
     */
    public const ALGORITHM_SHA256 = 'SHA-256';

    /**
     * @var string
     */
    public const ALGORITHM_HMAC_SHA256 = 'HMAC-SHA-256';

    /**
     * @var string
     */
    public const ALGORITHM_HMAC_SHA512 = 'HMAC-SHA-512';

    /**
     * @var string
     */
    public const ALGORITHM_DEFAULT = self::ALGORITHM_HMAC_SHA256;

    /**
     * @var string[]
     */
    public const EXCLUDED_FIELD = ['seal', 'sealAlgorithm', 'keyVersion'];

    public function calculateSeal(SipsMessage $sipsMessage, $secretKey, $algorithm = self::ALGORITHM_DEFAULT): void
    {
        $seal = $this->encrypt($this->getSealData($sipsMessage->toArray()), $secretKey, $algorithm);
        $sipsMessage->setSeal($seal);
        if (self::ALGORITHM_DEFAULT !== $algorithm) {
            $sipsMessage->setSealAlgorithm($algorithm);
        }
    }

    protected function encrypt(string $sealData, string $secretKey, string $algorithm = self::ALGORITHM_DEFAULT): string
    {
        switch ($algorithm) {
            case self::ALGORITHM_SHA256:
                return hash('sha256', $sealData.$secretKey);
            case self::ALGORITHM_HMAC_SHA256:
                return hash_hmac('sha256', $sealData, $secretKey);
            case self::ALGORITHM_HMAC_SHA512:
                return hash_hmac('sha512', $sealData, $secretKey);
        }
    }

    public function getSealData(array $array): string
    {
        $sealData = '';
        ksort($array);

        foreach ($array as $key => $value) {
            if (\in_array($key, self::EXCLUDED_FIELD, true)) {
                continue;
            }

            if (\is_array($value)) {
                $sealData .= $this->getSealData($value);
            } else {
                $sealData .= $value;
            }
        }

        return $sealData;
    }

    public function isCorrectSeal(InitializationResponse $initializationResponse, $secretKey, $sealAlgorithm): bool
    {
        $seal = $this->encrypt($this->getSealData($initializationResponse->toArray()), $secretKey, $sealAlgorithm);

        return $seal === $initializationResponse->getSeal();
    }

    public function checkSeal($response, $secretKey, $sealAlgorithm): bool
    {
        $seal = $this->encrypt($this->getSealData($response), $secretKey, $sealAlgorithm);

        return $seal === $response['seal'];
    }
}
