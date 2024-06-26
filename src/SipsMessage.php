<?php

declare(strict_types=1);

namespace Worldline\Sips;

use Worldline\Sips\Common\Field\Field;

class SipsMessage
{
    /**
     * Connecter where to send the request.
     */
    public ?string $connecter = null;

    protected ?string $interfaceVersion = null;

    protected ?int $keyVersion = null;

    protected ?string $merchantId = null;

    protected ?string $seal = null;

    public ?string $serviceUrl = null;

    protected ?string $sealAlgorithm = null;

    public function getConnecter(): string
    {
        return $this->connecter;
    }

    public function getServiceUrl(): string
    {
        return $this->serviceUrl;
    }

    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    public function getKeyVersion(): ?int
    {
        return $this->keyVersion;
    }

    public function getInterfaceVersion(): ?string
    {
        return $this->interfaceVersion;
    }

    public function getSeal(): ?string
    {
        return $this->seal;
    }

    /**
     * @return $this
     */
    public function getSealAlgorithm(): string
    {
        return $this->sealAlgorithm;
    }

    public function setMerchantId(string $merchantId): self
    {
        $this->merchantId = $merchantId;

        return $this;
    }

    public function setInterfaceVersion(string $interfaceVersion): self
    {
        $this->interfaceVersion = $interfaceVersion;

        return $this;
    }

    public function setKeyVersion(int $keyVersion): self
    {
        $this->keyVersion = $keyVersion;

        return $this;
    }

    public function setSeal(string $seal): self
    {
        $this->seal = $seal;

        return $this;
    }

    /**
     * @return $this
     */
    public function setSealAlgorithm(string $sealAlgorithm)
    {
        $this->sealAlgorithm = $sealAlgorithm;

        return $this;
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this as $key => $value) {
            if (null === $value) {
                // null values are excluded from the array export
                continue;
            }

            $array[$key] = $value instanceof Field ? $value->toArray() : $value;
        }

        unset($array['serviceUrl']);
        unset($array['connecter']);

        if (isset($array['s10TransactionReference'])) {
            unset($array['transactionReference']);
        }

        ksort($array);

        return $array;
    }
}
