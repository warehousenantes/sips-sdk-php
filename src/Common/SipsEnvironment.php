<?php

declare(strict_types=1);

namespace Worldline\Sips\Common;

use Worldline\Sips\Common\Exception\InvalidEnvironmentException;

class SipsEnvironment
{
    public const PAYPAGE = 'paypage';
    public const OFFICE = 'office';
    public const SIMULATION = 'SIMU';
    public const TEST = 'TEST';
    public const PRODUCTION = 'PROD';

    protected $possibleEnvironments = [
        self::PAYPAGE => [
            self::SIMULATION => 'https://payment-webinit.simu.sips-services.com/',
            self::TEST => 'https://payment-webinit.test.sips-services.com/',
            self::PRODUCTION => 'https://payment-webinit.sips-services.com/',
        ],
        self::OFFICE => [
            self::SIMULATION => 'https://office-server.simu.sips-services.com/',
            self::TEST => 'https://office-server.test.sips-services.com/',
            self::PRODUCTION => 'https://office-server.sips-services.com/',
        ],
    ];
    protected $environment;

    /**
     * SipsEnvironment constructor.
     *
     * @throws InvalidEnvironmentException
     */
    public function __construct(string $environment)
    {
        if (!\array_key_exists($environment, $this->possibleEnvironments[self::PAYPAGE])) {
            throw new InvalidEnvironmentException('Invalid environment "'.$environment.'"');
        }
        $this->environment = $environment;
    }

    public function getEnvironment(string $connecter): string
    {
        if (!\array_key_exists($connecter, $this->possibleEnvironments)) {
            throw new InvalidEnvironmentException('Invalid connecter "'.$connecter.'"');
        }

        return $this->possibleEnvironments[$connecter][$this->environment];
    }
}
