<?php

declare(strict_types=1);

namespace Worldline\Sips;

use Symfony\Component\HttpClient\HttpClient;
use Worldline\Sips\Common\Seal\JsonSealCalculator;
use Worldline\Sips\Common\Seal\PostSealCalculator;
use Worldline\Sips\Common\SipsEnvironment;
use Worldline\Sips\Paypage\PaypageResult;

/**
 * @see Test\SipsClientTest
 */
class SipsClient
{
    protected ?SipsEnvironment $environment = null;

    protected ?string $merchantId = null;

    protected ?string $secretKey = null;

    protected ?int $keyVersion = null;

    protected ?string $sealAlgorithm = null;

    /**
     * SipsClient constructor.
     */
    public function __construct(SipsEnvironment $environment, string $merchantId, string $secretKey, int $keyVersion)
    {
        $this->setEnvironment($environment);
        $this->setMerchantId($merchantId);
        $this->setSecretKey($secretKey);
        $this->setKeyVersion($keyVersion);
    }

    public function getEnvironment(): SipsEnvironment
    {
        return $this->environment;
    }

    public function setEnvironment(SipsEnvironment $environment): void
    {
        $this->environment = $environment;
    }

    public function initialize(SipsMessage $sipsMessage): ?array
    {
        $timeout = 0;
        $sipsMessage->setMerchantId($this->getMerchantId());
        $sipsMessage->setKeyVersion($this->getKeyVersion());

        $sealCalculator = new JsonSealCalculator();
        $sealAlgorithm = $this->sealAlgorithm ?? JsonSealCalculator::ALGORITHM_DEFAULT;
        $sealCalculator->calculateSeal($sipsMessage, $this->secretKey, $sealAlgorithm);

        $client = HttpClient::createForBaseUri($this->environment->getEnvironment($sipsMessage->getConnecter()));
        $response = $client->request('POST', $sipsMessage->getServiceUrl(), [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'timeout' => $timeout,
            ],
            'json' => $sipsMessage->toArray(),
        ]);

        $data = $response->toArray();
        if (!empty($data['seal'])) {
            $validSeal = $sealCalculator->checkSeal($data, $this->getSecretKey(), $sealAlgorithm);
            if (!$validSeal) {
                throw new \Exception('Invalid seal in response. Response not trusted.');
            }
        }

        return $data;
    }

    public function getSecretKey(): ?string
    {
        return $this->secretKey;
    }

    public function setSecretKey(string $secretKey): void
    {
        $this->secretKey = $secretKey;
    }

    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    public function setMerchantId(string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    public function getKeyVersion(): ?int
    {
        return $this->keyVersion;
    }

    public function setKeyVersion(int $keyVersion): void
    {
        $this->keyVersion = $keyVersion;
    }

    public function getSealAlgorithm(): ?string
    {
        return $this->sealAlgorithm;
    }

    /**
     * @param string $sealAlgorithm
     *
     * @return $this
     */
    public function setSealAlgorithm($sealAlgorithm): self
    {
        $this->sealAlgorithm = $sealAlgorithm;

        return $this;
    }

    /**
     * @throws \Exception
     */
    public function finalizeTransaction(): PaypageResult
    {
        $data = $_POST['Data'] ?? '';
        $seal = $_POST['Seal'] ?? '';
        $sealCalculator = new PostSealCalculator();
        if (!$sealCalculator->isCorrectSeal($data, $this->secretKey, $seal)) {
            throw new \Exception('Invalid seal in response. Response not trusted.');
        }

        return new PaypageResult($data);
    }
}
