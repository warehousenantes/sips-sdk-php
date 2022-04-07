<?php

declare(strict_types=1);

namespace Worldline\Sips;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Worldline\Sips\Common\Seal\JsonSealCalculator;
use Worldline\Sips\Common\Seal\PostSealCalculator;
use Worldline\Sips\Common\SipsEnvironment;
use Worldline\Sips\Paypage\PaypageResult;

/**
 * @see \Worldline\Sips\Test\SipsClientTest
 */
class SipsClient
{
    /**
     * @var SipsEnvironment
     */
    protected $environment;

    /**
     * @var string
     */
    protected $merchantId;

    /**
     * @var string
     */
    protected $secretKey;

    /**
     * @var int
     */
    protected $keyVersion;

    /**
     * @var string
     */
    protected $sealAlgorithm;

    /**
     * @var string
     */
    protected $lastRequestAsJson;

    /**
     * @var string
     */
    protected $lastResponseAsJson;

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

    public function getEnvironment(): ?string
    {
        return $this->environment;
    }

    public function setEnvironment(SipsEnvironment $environment): void
    {
        $this->environment = $environment;
    }

    /**
     * @param SipsMessage $paymentRequest
     *
     * @throws \Exception
     */
    public function initialize(SipsMessage $sipsMessage): ?array
    {
        $timeout = 0;
        $sipsMessage->setMerchantId($this->getMerchantId());
        $sipsMessage->setKeyVersion($this->getKeyVersion());

        $sealCalculator = new JsonSealCalculator();
        $sealAlgorithm = $this->sealAlgorithm ?? JsonSealCalculator::ALGORITHM_DEFAULT;
        $sealCalculator->calculateSeal($sipsMessage, $this->secretKey, $sealAlgorithm);
        $json = json_encode($sipsMessage->toArray(), \JSON_THROW_ON_ERROR);
        $this->lastRequestAsJson = $json;
        $client = new Client([
            'base_uri' => $this->environment->getEnvironment($sipsMessage->getConnecter()),
            'timeout' => $timeout,
            ]);
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'timeout' => $timeout,
        ];
        $request = new Request('POST', $sipsMessage->getServiceUrl(), $headers, $json);
        $response = $client->send($request, ['timeout' => $timeout]);
        $this->lastResponseAsJson = $response->getBody()->getContents();
        $data = json_decode($this->lastResponseAsJson, true, 512, \JSON_THROW_ON_ERROR);
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

    public function getLastRequestAsJson(): ?string
    {
        return $this->lastRequestAsJson;
    }

    public function getSealAlgorithm(): ?string
    {
        return $this->sealAlgorithm;
    }

    /**
     * @param type $sealAlgorithm
     *
     * @return $this
     */
    public function setSealAlgorithm($sealAlgorithm): self
    {
        $this->sealAlgorithm = $sealAlgorithm;

        return $this;
    }

    public function getLastResponseAsJson(): ?string
    {
        return $this->lastResponseAsJson;
    }

    /**
     * @throws \Exception
     */
    public function finalizeTransaction(): PaypageResult
    {
        $data = $_POST['Data'];
        $seal = $_POST['Seal'];
        $sealCalculator = new PostSealCalculator();
        if (!$sealCalculator->isCorrectSeal($data, $this->secretKey, $seal)) {
            throw new \Exception('Invalid seal in response. Response not trusted.');
        }

        return new PaypageResult($data);
    }
}
