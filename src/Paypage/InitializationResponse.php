<?php

declare(strict_types=1);

namespace Worldline\Sips\Paypage;

/**
 * Class InitializationResponse.
 */
/**
 * Class InitializationResponse.
 */
class InitializationResponse
{
    protected $errorFieldName;
    protected $redirectionData;
    protected $redirectionStatusCode;
    protected $redirectionStatusMessage;
    protected $redirectionUrl;
    protected $redirectionVersion;
    protected $responseCode;
    protected $seal;

    /**
     * InitializationResponse constructor.
     */
    public function __construct(array $responseArray)
    {
        foreach ($responseArray as $key => $value) {
            switch ($key) {
                case 'errorFieldName':
                    $this->errorFieldName = $value;
                    break;
                case 'redirectionData':
                    $this->redirectionData = $value;
                    break;
                case 'redirectionStatusCode':
                    $this->redirectionStatusCode = $value;
                    break;
                case 'redirectionStatusMessage':
                    $this->redirectionStatusMessage = $value;
                    break;
                case 'redirectionUrl':
                    $this->redirectionUrl = $value;
                    break;
                case 'redirectionVersion':
                    $this->redirectionVersion = $value;
                    break;
                case 'responseCode':
                    $this->responseCode = $value;
                    break;
                case 'seal':
                    $this->seal = $value;
                    break;
            }
        }
    }

    public function getErrorFieldName(): ?string
    {
        return $this->errorFieldName;
    }

    public function getRedirectionData(): ?string
    {
        return $this->redirectionData;
    }

    public function getRedirectionStatusCode(): ?string
    {
        return $this->redirectionStatusCode;
    }

    public function getRedirectionStatusMessage(): ?string
    {
        return $this->redirectionStatusMessage;
    }

    public function getRedirectionUrl(): ?string
    {
        return $this->redirectionUrl;
    }

    public function getRedirectionVersion(): ?string
    {
        return $this->redirectionVersion;
    }

    public function getResponseCode(): ?string
    {
        return $this->responseCode;
    }

    public function getSeal(): ?string
    {
        return $this->seal;
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this as $key => $value) {
            if (null !== $value && 'seal' !== $key) {
                if (\is_int($value) || \is_string($value)) {
                    $array[$key] = $value;
                } else {
                    $array[$key] = $value->toArray();
                }
            }
        }
        ksort($array);

        return $array;
    }
}
