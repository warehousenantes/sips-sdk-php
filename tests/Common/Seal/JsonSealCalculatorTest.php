<?php

declare(strict_types=1);

namespace Worldline\Sips\Test\Common\Seal;

use PHPUnit\Framework\TestCase;
use Worldline\Sips\Common\Field\Address;
use Worldline\Sips\Common\Field\Contact;
use Worldline\Sips\Common\Seal\JsonSealCalculator;
use Worldline\Sips\Paypage\PaypageRequest;

class JsonSealCalculatorTest extends TestCase
{
    protected PaypageRequest $paypageRequest;

    protected JsonSealCalculator $jsonSealCalculator;

    /**
     * @before
     */
    public function setupParameters(): void
    {
        $this->paypageRequest = new PaypageRequest();
        $this->paypageRequest->setAmount(2);
        $this->paypageRequest->setCurrencyCode('EUR');
        $this->paypageRequest->setOrderChannel('INTERNET');
        $this->paypageRequest->setNormalReturnUrl('http://localhost/return.php');
        $this->paypageRequest->setTemplateName('custom');
        $this->paypageRequest->setAutomaticResponseUrl('http://test.com');
        $this->paypageRequest->setTransactionReference('test');

        $this->jsonSealCalculator = new JsonSealCalculator();
    }

    public function testGetSealData(): void
    {
        $calculatedSealData = $this->jsonSealCalculator->getSealData($this->paypageRequest->toArray());
        $expectedSealData = '2http://test.com978IR_WS_2.35http://localhost/return.phpINTERNETcustomtest';

        $this->assertSame($expectedSealData, $calculatedSealData);
    }

    public function testGetSealDataWithList(): void
    {
        $this->paypageRequest->setPaymentMeanBrandList(['VISA', 'MASTERCARD']);
        $calculatedSealData = $this->jsonSealCalculator->getSealData($this->paypageRequest->toArray());
        $expectedSealData = '2http://test.com978IR_WS_2.35http://localhost/return.phpINTERNETVISAMASTERCARDcustomtest';

        $this->assertSame($expectedSealData, $calculatedSealData);
    }

    public function testGetSealDataWithContainer(): void
    {
        $customerContact = new Contact();
        $customerContact->setFirstname('Firstname');
        $customerContact->setLastname('Lastname');

        $this->paypageRequest->setCustomerContact($customerContact);
        $customerAddress = new Address();
        $customerAddress->setCity('CustomerCity');
        $customerAddress->setCountry('CustomerCountry');

        $this->paypageRequest->setCustomerAddress($customerAddress);

        $expectedSealData = '2http://test.com978CustomerCityCustomerCountryFirstnameLastnameIR_WS_2.35http://localhost/return.phpINTERNETcustomtest';
        $calculatedSealData = $this->jsonSealCalculator->getSealData($this->paypageRequest->toArray());

        $this->assertSame($expectedSealData, $calculatedSealData);
    }
}
