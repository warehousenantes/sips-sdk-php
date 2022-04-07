<?php

declare(strict_types=1);

namespace Worldline\Sips\Paypage;

use Worldline\Sips\Common\Field\Address;
use Worldline\Sips\Common\Field\Contact;
use Worldline\Sips\Common\Field\CustomerAccountHistoric;
use Worldline\Sips\Common\Field\DeliveryData;
use Worldline\Sips\Common\Field\FraudData;
use Worldline\Sips\Common\Field\PaypageData;
use Worldline\Sips\Common\Field\S10TransactionReference;
use Worldline\Sips\Common\Field\ShoppingCartDetail;
use Worldline\Sips\Common\SipsEnvironment;
use Worldline\Sips\SipsMessage;

/**
 * Class PaypageRequest.
 */
class PaypageRequest extends SipsMessage
{
    /**
     * Transaction amount. The amount must be transmitted in the smallest unit of currency.
     * For example in euros: an amount of EUR 10.50 must be transmitted in the form 1050.
     */
    protected ?int $amount = null;

    /**
     * Contains the information on the cardholder's authentication.
     *
     * @toto Create the container
     */
    protected ?string $authenticationData = null;

    /**
     * URL provided by the merchant and used by the payment server to automatically notify the merchant of the result of the transaction online.
     */
    protected ?string $automaticResponseUrl = null;

    /**
     * Contains the billing address information for the buyer.
     */
    protected ?Address $billingAddress = null;

    /**
     * Contains the billing contact's information.
     */
    protected ?Contact $billingContact = null;

    /**
     * First successful billing date for the customer address. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @var string YYYYMMMDD
     */
    protected ?string $billingFirstDate = null;

    /**
     * Indicator used by the merchant to bypass the dcc procedure.
     *
     * @var string Y/N
     */
    protected ?string $bypassDcc = null;

    /**
     * Flag indicating that WL Sips must not edit the ticket receipt. This action is at charge of the trader. At the end of the payment, the customer is directly redirected to the response url from the shop (normalReturnUrl).
     */
    protected ?string $bypassReceiptPage = null;

    /**
     * Deadline for settlement.
     */
    protected ?int $captureDay = null;

    /**
     * Payment collection method for the transaction.
     *
     * @see \Worldline\Sips\Values\CaptureMode
     */
    protected ?string $captureMode = null;

    /**
     * Currency code for the transaction. This code is ISO 4217 compatible.
     *
     * @see Worldline\Sips\Values\CurrencyCode
     */
    protected ?string $currencyCode = null;

    /**
     * Date of a 3D Secure transaction successfuly realised for the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @var string YYYYMMDD
     */
    protected ?string $customer3DSTransactionDate = null;

    /**
     * Contains information from the customer's account at the merchant (date of creation, number of transactions in the last 24h, ...).
     */
    protected ?CustomerAccountHistoric $customerAccountHistoric = null;

    /**
     * Contains the customer's address information.
     */
    protected ?Address $customerAddress = null;

    /**
     * Number of billing realised for the customer address. For example, the merchant gives this information to allow the certification of an electronic signature.
     */
    protected ?int $customerBillingNb = null;

    /**
     * Contains the customer's information.
     */
    protected ?Contact $customerContact = null;

    /**
     * Contains the customer's information.
     */
    protected ?Contact $customerData = null;

    /**
     * Successful delivery flag for the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @var string Y/N
     */
    protected ?string $customerDeliverySuccessFlag = null;

    /**
     * Customer identifier.
     */
    protected ?string $customerId = null;

    /**
     * Buyer's IP address.
     */
    protected ?string $customerIpAddress = null;

    /**
     * Language of the user, used on the payment pages.
     *
     * @see Worldline\Sips\Values\CustomerLanguage
     */
    protected ?string $customerLanguage = null;

    /**
     * Method used to validate the customer phone number. For example, the merchant gives this information to allow the certification of an electronic signature.
     */
    protected ?string $customerPhoneValidationMethod = null;

    /**
     * Online registration date of the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @var string YYYYMMDD
     */
    protected ?string $customerRegistrationDateOnline = null;

    /**
     * On site (Point Of Sale) registration date of the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @var string YYYYMMDD
     */
    protected ?string $customerRegistrationDateProxi = null;

    /**
     * ** NOT DOCUMENTED **.
     *
     * @todo
     */
    protected ?string $customerTimestampIpAddress = null;

    /**
     * Contains the delivery address information.
     */
    protected ?Address $deliveryAddress = null;

    /**
     * Contains the delivery contact's information.
     */
    protected ?Contact $deliveryContact = null;

    /**
     * Contains the delivery information.
     */
    protected ?DeliveryData $deliveryData = null;

    /**
     * First successful delivery date at the customer address. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @var string YYYYMMDD
     */
    protected ?string $deliveryFirstDate = null;

    /**
     * Date when the customer has provided the proof to the merchant. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @var string YYYYMMDD
     */
    protected ?string $evidenceAcquisitionDate = null;

    /**
     * Number of the proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     */
    protected ?string $evidenceNumber = null;

    /**
     * Type of proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     */
    protected ?string $evidenceType = null;

    /**
     * Contains the transaction's antifraud rules parameters, allowing the merchant to dynamically customise the rules registered in the merchant configuration.
     */
    protected ?FraudData $fraudData = null;

    /**
     * Cryptographic function used to calculate the hashPan.
     */
    protected ?string $hashAlgorithm1 = null;

    /**
     * Cryptographic function used to calculate the hashPan.
     */
    protected ?string $hashAlgorithm2 = null;

    /**
     * Random value (called a seed) provided by the merchant to calculate the hashPan.
     */
    protected ?string $hashSalt1 = null;

    /**
     * Random value (called a seed) provided by the merchant to calculate the hashPan.
     */
    protected ?string $hashSalt2 = null;

    /**
     * Additional reference of the holder that is communicated to the acquirer system or the issuer system in order to make some additional dedicated checks.
     */
    protected ?string $holderAdditionalReference = null;

    /**
     * Contains the payment mean holder's address information.
     */
    protected ?Address $holderAddress = null;

    /**
     * Contains contact details of the payment mean holder.
     */
    protected ?Contact $holderContact = null;

    /**
     * Contains the payment mean holder's information.
     *
     * @todo create the container
     */
    protected ?string $holderData = null;

    /**
     * Contains the information making it possible to make a payment in instalments.
     *
     * @todo
     */
    protected ?string $instalmentData = null;

    /**
     * Identifier of the Service used by the merchant for the exchanges with the WL Sips platform.
     */
    protected ?string $intermediateServiceProviderId = null;

    /**
     * Invoice reference.
     */
    protected ?string $invoiceReference = null;

    /**
     * Mandate number.
     */
    protected ?string $mandateId = null;

    /**
     * Merchant name (equivalent to the Merchant name registered during the Shop enrollment).
     * If indicated in the payment request, allows to change the name displayed on the 3-D Secure authentication page.
     */
    protected ?string $merchantName = null;

    /**
     * Merchant's session number. Allows consolidation between requests and responses.
     */
    protected ?string $merchantSessionId = null;

    /**
     * Date and time of the transaction, set by the merchant at the merchant's local time (in the merchant's time zone).
     *
     * @var string date time ISO8601
     */
    protected ?string $merchantTransactionDateTime = null;

    /**
     * Merchant web site URL.
     */
    protected ?string $merchantUrl = null;

    /**
     * Customer's Wallet identifier.
     */
    protected ?string $merchantWalletId = null;

    /**
     * Merchant's URL for the return to the shop.
     */
    protected ?string $normalReturnUrl = null;

    /**
     * Order channel used (Internet, Telephone, Post, Fax etc), Internet is the default value.
     * Use of this field should be reconciled with the conditions defined in the acquirer contract.
     *
     * @todo Create the values
     */
    protected ?string $orderChannel = null;

    /**
     * Contains specific information regarding the order context.
     *
     * @todo Create the container
     */
    protected ?string $orderContext = null;

    /**
     * Order number associated with the payment transaction.
     */
    protected ?string $orderId = null;

    /**
     * List of payment methods accepted for a transaction.
     * If this field is not filled out, the WL Sips server recovers the list of payment methods available for the configuration of the shop.
     *
     * @see \Worldline\Sips\Values\PaymentMeanBrandType
     */
    protected array $paymentMeanBrandList = [];

    /**
     * Contains specific information regarding the payment method used by the buyer.
     *
     * @todo Create the container
     */
    protected ?string $paymentMeanData = null;

    /**
     * Type of payment (per operation, 1st recurring payment etc).
     *
     * @see \Worldline\Sips\Values\PaymentPattern
     */
    protected ?string $paymentPattern = null;

    /**
     * Contains the parameters for the payment pages, allowing the merchant to dynamically customise the options on payment pages.
     */
    protected ?PaypageData $paypageData = null;

    /**
     * Encoding type of the response expected by the merchant.
     *
     * @todo create the values
     */
    protected ?string $responseEncoding = null;

    /**
     * Identifier of the merchant's secret key used to calculate the imprint of the response.
     */
    protected ?int $responseKeyVersion = null;

    /**
     * Context of a buyer's order.
     * All information transmitted in this field by the merchant during the payment request is sent back in the response without amendment.
     * Attention : the following characters "|", "«", "»", and «"» are forbidden in this field. If they are used, they will be replaced by blanks.
     */
    protected ?string $returnContext = null;

    /**
     * List of merchant privative information transmitted by the a Business Score scoring system.
     */
    protected ?string $riskManagementCustomDataList = null;

    /**
     * Contains the identification of the original transaction (to be compliant with WL Sips 1.0).
     */
    protected ?S10TransactionReference $s10TransactionReference = null;

    /**
     * Information specific to the basket.
     */
    protected ?ShoppingCartDetail $shoppingCartDetail = null;

    /**
     * Reference provided by the merchant which is sent in the payment collection flow. This reference appears on the account statements of the cardholder.
     */
    protected ?string $statementReference = null;

    /**
     * Contains address information of a merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     */
    protected ?Address $subMerchantAddress = null;

    /**
     * MCC Code of the vendor at the Payment Facilitator in a context of Collecting offer or a Marketplace offer.
     */
    protected ?string $subMerchantCategoryCode = null;

    /**
     * Merchant contract number of the Payment Facilitator in the context of Collecting offer or a Marketplace offer (only used for Cetelem).
     */
    protected ?string $subMerchantContractNumber = null;

    /**
     * Merchant identifier of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     */
    protected ?string $subMerchantId = null;

    /**
     * Legal identifier of vendor as merchant of the Payment Facilitator, expressed in the legal codification specific to each country.
     */
    protected ?string $subMerchantLegalId = null;

    /**
     * Name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     */
    protected ?string $subMerchantName = null;

    /**
     * Short name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     */
    protected ?string $subMerchantShortName = null;

    /**
     * Name of the file corresponding to the style sheet (name of the zip file) used to personalize the payment pages.
     */
    protected ?string $templateName = null;

    /**
     * Indicates the players in the transaction.
     *
     * @todo create the values
     */
    protected ?string $transactionActors = null;

    /**
     * Origin of a transaction (for example: name of the programme), set by the merchant. Exemple: "Website A v1.32".
     */
    protected ?string $transactionOrigin = null;

    /**
     * The merchant can choose of referencing his transactions by a transactionId or a transactionReference.
     * transactionReference uniquely identifies a transaction throughout the life of the shop.
     */
    protected ?string $transactionReference = null;

    /**
     * Contains specific information regarding the travel.
     *
     * @todo create the container
     */
    protected ?string $travelContext = null;

    /**
     * Payment value date.
     *
     * @var string YYYYMMDD
     */
    protected ?string $valueDate = null;

    /**
     * @var string
     */
    public const PAYMENT_MEAN_BRAND_CB = 'CB';

    /**
     * @var string
     */
    public const PAYMENT_MEAN_BRAND_MASTERCARD = 'MASTERCARD';

    /**
     * @var string
     */
    public const PAYMENT_MEAN_BRAND_VISA = 'VISA';

    /**
     * @var string
     */
    public const PAYMENT_MEAN_BRAND_AMEX = 'AMEX';

    /**
     * PaypageRequest constructor.
     */
    public function __construct()
    {
        $this->connecter = SipsEnvironment::PAYPAGE;
        $this->serviceUrl = 'rs-services/v2/paymentInit';
        $this->interfaceVersion = 'IR_WS_2.35';
        $this->setTransactionReference($this->generateReference());
    }

    /**
     * Let SIPS server generated the transaction key.
     */
    public function useAutoGeneratedTransactionKey(): void
    {
        $this->setTransactionReference(null);
    }

    public function generateReference(): string
    {
        $microtime = explode(' ', microtime());
        $microtime[0] *= 1_000_000;

        return $microtime[1].$microtime[0];
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAutomaticResponseUrl(): ?string
    {
        return $this->automaticResponseUrl;
    }

    public function setAutomaticResponseUrl(string $automaticResponseUrl): self
    {
        $this->automaticResponseUrl = $automaticResponseUrl;

        return $this;
    }

    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getBillingContact(): ?Contact
    {
        return $this->billingContact;
    }

    public function setBillingContact(Contact $billingContact): self
    {
        $this->billingContact = $billingContact;

        return $this;
    }

    public function getCaptureDay(): ?int
    {
        return $this->captureDay;
    }

    public function setCaptureDay(int $captureDay): self
    {
        $this->captureDay = $captureDay;

        return $this;
    }

    public function getCaptureMode(): ?string
    {
        return $this->captureMode;
    }

    public function setCaptureMode(string $captureMode): self
    {
        if (\in_array($captureMode, ['AUTHOR_CAPTURE', 'IMMEDIATE', 'VALIDATION'], true)) {
            $this->captureMode = $captureMode;

            return $this;
        }

        throw new \InvalidArgumentException('Invalid captureMode. Choose between AUTHOR_CAPTURE, IMMEDIATE or VALIDATION.');
    }

    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(string $currencyCode): self
    {
        $validCurrencyCodes = [
            'ARS' => '032',
            'AUD' => '036',
            'BHD' => '048',
            'KHR' => '116',
            'CAD' => '124',
            'LKR' => '144',
            'CNY' => '156',
            'HRK' => '191',
            'CZK' => '203',
            'DKK' => '208',
            'HKD' => '344',
            'HUF' => '348',
            'ISK' => '352',
            'INR' => '356',
            'ILS' => '376',
            'JPY' => '392',
            'KRW' => '410',
            'KWD' => '414',
            'MYR' => '458',
            'MUR' => '480',
            'MXN' => '484',
            'NPR' => '524',
            'NZD' => '554',
            'NOK' => '578',
            'QAR' => '634',
            'RUB' => '643',
            'SAR' => '682',
            'SGD' => '702',
            'ZAR' => '710',
            'SEK' => '752',
            'CHF' => '756',
            'THB' => '764',
            'AED' => '784',
            'TND' => '788',
            'GBP' => '826',
            'USD' => '840',
            'TWD' => '901',
            'RON' => '946',
            'TRY' => '949',
            'XOF' => '952',
            'XPF' => '953',
            'BGN' => '975',
            'EUR' => '978',
            'UAH' => '980',
            'PLN' => '985',
            'BRL' => '986',
        ];
        if (\array_key_exists($currencyCode, $validCurrencyCodes)) {
            $this->currencyCode = $validCurrencyCodes[$currencyCode];

            return $this;
        } elseif (\in_array($currencyCode, $validCurrencyCodes, true)) {
            $this->currencyCode = $currencyCode;

            return $this;
        }

        throw new \InvalidArgumentException('Invalid currencyCode. Select a valid code from the data dictionary.');
    }

    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return Address
     */
    public function getCustomerAddress(): ?Address
    {
        return $this->customerAddress;
    }

    public function setCustomerAddress(Address $customerAddress): self
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    public function getCustomerContact(): ?Contact
    {
        return $this->customerContact;
    }

    public function setCustomerContact(Contact $customerContact): self
    {
        $this->customerContact = $customerContact;

        return $this;
    }

    public function getCustomerLanguage(): ?string
    {
        return $this->customerLanguage;
    }

    public function setCustomerLanguage(string $customerLanguage): self
    {
        $validCustomerLanguages = [
            'bg',
            'br',
            'cs',
            'da',
            'de',
            'el',
            'en',
            'es',
            'et',
            'fi',
            'fr',
            'hi',
            'hr',
            'hu',
            'it',
            'ja',
            'ko',
            'lt',
            'lv',
            'nl',
            'no',
            'pl',
            'pt',
            'ro',
            'ru',
            'sk',
            'sl',
            'sv',
            'tr',
            'tr',
            'uk',
            'zh',
        ];
        if (\in_array($customerLanguage, $validCustomerLanguages, true)) {
            $this->customerLanguage = $customerLanguage;

            return $this;
        }

        throw new \InvalidArgumentException('Invalid customerLanguage. Select a valid code from the data dictionary.');
    }

    /**
     * @return Address
     */
    public function getDeliveryAddress(): ?Address
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(Address $deliveryAddress): self
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    public function getDeliveryContact(): ?Contact
    {
        return $this->deliveryContact;
    }

    public function setDeliveryContact(Contact $deliveryContact): self
    {
        $this->deliveryContact = $deliveryContact;

        return $this;
    }

    /**
     * @return Address
     */
    public function getHolderAddress(): ?Address
    {
        return $this->holderAddress;
    }

    public function setHolderAddress(Address $holderAddress): self
    {
        $this->holderAddress = $holderAddress;

        return $this;
    }

    public function getHolderContact(): ?Contact
    {
        return $this->holderContact;
    }

    public function setHolderContact(Contact $holderContact): self
    {
        $this->holderContact = $holderContact;

        return $this;
    }

    public function getIntermediateServiceProviderId(): ?string
    {
        return $this->intermediateServiceProviderId;
    }

    public function setIntermediateServiceProviderId(string $intermediateServiceProviderId): self
    {
        $this->intermediateServiceProviderId = $intermediateServiceProviderId;

        return $this;
    }

    public function getMerchantWalletId(): ?string
    {
        return $this->merchantWalletId;
    }

    public function setMerchantWalletId(string $merchantWalletId): self
    {
        $this->merchantWalletId = $merchantWalletId;

        return $this;
    }

    public function getNormalReturnUrl(): ?string
    {
        return $this->normalReturnUrl;
    }

    public function getBypassReceiptPage(): bool
    {
        return 'true' === $this->bypassReceiptPage;
    }

    public function setNormalReturnUrl(string $normalReturnUrl): self
    {
        $this->normalReturnUrl = $normalReturnUrl;

        return $this;
    }

    public function getOrderChannel(): ?string
    {
        return $this->orderChannel;
    }

    public function setOrderChannel(string $orderChannel): self
    {
        if (\in_array($orderChannel, ['INTERNET', 'MOTO', 'INAPP'], true)) {
            $this->orderChannel = $orderChannel;

            return $this;
        }

        throw new \InvalidArgumentException('Invalid orderChannel. Choose between INTERNET, MOTO or INAPP');
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getPaymentMeanBrandList(): ?array
    {
        return $this->paymentMeanBrandList;
    }

    public function setPaymentMeanBrandList(array $paymentMeanBrandList): self
    {
        $this->paymentMeanBrandList = $paymentMeanBrandList;

        return $this;
    }

    public function getTransactionReference(): ?string
    {
        return $this->transactionReference;
    }

    public function setTransactionReference(string $transactionReference): self
    {
        $this->transactionReference = $transactionReference;

        return $this;
    }

    public function getStatementReference(): ?string
    {
        return $this->statementReference;
    }

    public function setStatementReference(string $statementReference): self
    {
        $this->statementReference = $statementReference;

        return $this;
    }

    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    public function setTemplateName(string $templateName): self
    {
        $this->templateName = $templateName;

        return $this;
    }

    /**
     * @return PaypageData
     */
    public function getPaypageData(): ?PaypageData
    {
        return $this->paypageData;
    }

    public function setPaypageData(PaypageData $paypageData): self
    {
        $this->paypageData = $paypageData;

        return $this;
    }

    public function setBypassReceiptPage(bool $bypass): void
    {
        // Seems that this parameter is a string (A5, restricted value)
        $this->bypassReceiptPage = ($bypass ? 'true' : 'false');
    }

    public function getS10TransactionReference(): S10TransactionReference
    {
        return $this->s10TransactionReference;
    }

    public function setS10TransactionReference(S10TransactionReference $s10TransactionReference)
    {
        unset($this->transactionReference);
        $this->s10TransactionReference = $s10TransactionReference;

        return $this;
    }

    /**
     * Get the value of fraudData.
     *
     * @return FraudData
     */
    public function getFraudData(): ?FraudData
    {
        return $this->fraudData;
    }

    /**
     * Set the value of fraudData.
     *
     * @return self
     */
    public function setFraudData(FraudData $fraudData)
    {
        $this->fraudData = $fraudData;

        return $this;
    }

    /**
     * Get contains the information on the cardholder's authentication.
     *
     * @return string
     */
    public function getAuthenticationData()
    {
        return $this->authenticationData;
    }

    /**
     * Set contains the information on the cardholder's authentication.
     *
     * @param string $authenticationData contains the information on the cardholder's authentication
     *
     * @return self
     */
    public function setAuthenticationData(string $authenticationData)
    {
        $this->authenticationData = $authenticationData;

        return $this;
    }

    /**
     * Get yYYYMMMDD.
     *
     * @return string
     */
    public function getBillingFirstDate()
    {
        return $this->billingFirstDate;
    }

    /**
     * Set yYYYMMMDD.
     *
     * @param string $billingFirstDate YYYYMMMDD
     *
     * @return self
     */
    public function setBillingFirstDate(string $billingFirstDate)
    {
        $this->billingFirstDate = $billingFirstDate;

        return $this;
    }

    /**
     * Get y/N.
     *
     * @return string
     */
    public function getBypassDcc()
    {
        return $this->bypassDcc;
    }

    /**
     * Set y/N.
     *
     * @param string $bypassDcc Y/N
     *
     * @return self
     */
    public function setBypassDcc(string $bypassDcc)
    {
        $this->bypassDcc = $bypassDcc;

        return $this;
    }

    /**
     * Get yYYYMMDD.
     *
     * @return string
     */
    public function getCustomer3DSTransactionDate()
    {
        return $this->customer3DSTransactionDate;
    }

    /**
     * Set yYYYMMDD.
     *
     * @param string $customer3DSTransactionDate YYYYMMDD
     *
     * @return self
     */
    public function setCustomer3DSTransactionDate(string $customer3DSTransactionDate)
    {
        $this->customer3DSTransactionDate = $customer3DSTransactionDate;

        return $this;
    }

    /**
     * Get contains information from the customer's account at the merchant (date of creation, number of transactions in the last 24h, ...).
     *
     * @return CustomerAccountHistoric
     */
    public function getCustomerAccountHistoric()
    {
        return $this->customerAccountHistoric;
    }

    /**
     * Set contains information from the customer's account at the merchant (date of creation, number of transactions in the last 24h, ...).
     *
     * @param CustomerAccountHistoric $customerAccountHistoric Contains information from the customer's account at the merchant (date of creation, number of transactions in the last 24h, ...).
     *
     * @return self
     */
    public function setCustomerAccountHistoric(CustomerAccountHistoric $customerAccountHistoric)
    {
        $this->customerAccountHistoric = $customerAccountHistoric;

        return $this;
    }

    /**
     * Get number of billing realised for the customer address. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return int
     */
    public function getCustomerBillingNb()
    {
        return $this->customerBillingNb;
    }

    /**
     * Set number of billing realised for the customer address. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @param int $customerBillingNb Number of billing realised for the customer address. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return self
     */
    public function setCustomerBillingNb($customerBillingNb)
    {
        $this->customerBillingNb = $customerBillingNb;

        return $this;
    }

    /**
     * Get contains the customer's information.
     *
     * @return Contact
     */
    public function getCustomerData()
    {
        return $this->customerData;
    }

    /**
     * Set contains the customer's information.
     *
     * @param Contact $customerData contains the customer's information
     *
     * @return self
     */
    public function setCustomerData(Contact $customerData)
    {
        $this->customerData = $customerData;

        return $this;
    }

    /**
     * Get y/N.
     *
     * @return string
     */
    public function getCustomerDeliverySuccessFlag()
    {
        return $this->customerDeliverySuccessFlag;
    }

    /**
     * Set y/N.
     *
     * @param string $customerDeliverySuccessFlag Y/N
     *
     * @return self
     */
    public function setCustomerDeliverySuccessFlag(string $customerDeliverySuccessFlag)
    {
        $this->customerDeliverySuccessFlag = $customerDeliverySuccessFlag;

        return $this;
    }

    /**
     * Get buyer's IP address.
     *
     * @return string
     */
    public function getCustomerIpAddress()
    {
        return $this->customerIpAddress;
    }

    /**
     * Set buyer's IP address.
     *
     * @param string $customerIpAddress buyer's IP address
     *
     * @return self
     */
    public function setCustomerIpAddress(string $customerIpAddress)
    {
        $this->customerIpAddress = $customerIpAddress;

        return $this;
    }

    /**
     * Get method used to validate the customer phone number. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return string
     */
    public function getCustomerPhoneValidationMethod()
    {
        return $this->customerPhoneValidationMethod;
    }

    /**
     * Set method used to validate the customer phone number. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @param string $customerPhoneValidationMethod Method used to validate the customer phone number. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return self
     */
    public function setCustomerPhoneValidationMethod(string $customerPhoneValidationMethod)
    {
        $this->customerPhoneValidationMethod = $customerPhoneValidationMethod;

        return $this;
    }

    /**
     * Get yYYYMMDD.
     *
     * @return string
     */
    public function getCustomerRegistrationDateOnline()
    {
        return $this->customerRegistrationDateOnline;
    }

    /**
     * Set yYYYMMDD.
     *
     * @param string $customerRegistrationDateOnline YYYYMMDD
     *
     * @return self
     */
    public function setCustomerRegistrationDateOnline(string $customerRegistrationDateOnline)
    {
        $this->customerRegistrationDateOnline = $customerRegistrationDateOnline;

        return $this;
    }

    /**
     * Get yYYYMMDD.
     *
     * @return string
     */
    public function getCustomerRegistrationDateProxi()
    {
        return $this->customerRegistrationDateProxi;
    }

    /**
     * Set yYYYMMDD.
     *
     * @param string $customerRegistrationDateProxi YYYYMMDD
     *
     * @return self
     */
    public function setCustomerRegistrationDateProxi(string $customerRegistrationDateProxi)
    {
        $this->customerRegistrationDateProxi = $customerRegistrationDateProxi;

        return $this;
    }

    /**
     * Get ** NOT DOCUMENTED **.
     *
     * @return string
     */
    public function getCustomerTimestampIpAddress()
    {
        return $this->customerTimestampIpAddress;
    }

    /**
     * Set ** NOT DOCUMENTED **.
     *
     * @param string $customerTimestampIpAddress ** NOT DOCUMENTED **
     *
     * @return self
     */
    public function setCustomerTimestampIpAddress(string $customerTimestampIpAddress)
    {
        $this->customerTimestampIpAddress = $customerTimestampIpAddress;

        return $this;
    }

    /**
     * Get contains the delivery information.
     *
     * @return DeliveryData
     */
    public function getDeliveryData()
    {
        return $this->deliveryData;
    }

    /**
     * Set contains the delivery information.
     *
     * @param DeliveryData $deliveryData contains the delivery information
     *
     * @return self
     */
    public function setDeliveryData(DeliveryData $deliveryData)
    {
        $this->deliveryData = $deliveryData;

        return $this;
    }

    /**
     * Get yYYYMMDD.
     *
     * @return string
     */
    public function getDeliveryFirstDate()
    {
        return $this->deliveryFirstDate;
    }

    /**
     * Set yYYYMMDD.
     *
     * @param string $deliveryFirstDate YYYYMMDD
     *
     * @return self
     */
    public function setDeliveryFirstDate(string $deliveryFirstDate)
    {
        $this->deliveryFirstDate = $deliveryFirstDate;

        return $this;
    }

    /**
     * Get type of proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return string
     */
    public function getEvidenceType()
    {
        return $this->evidenceType;
    }

    /**
     * Set type of proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @param string $evidenceType Type of proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return self
     */
    public function setEvidenceType(string $evidenceType)
    {
        $this->evidenceType = $evidenceType;

        return $this;
    }

    /**
     * Get number of the proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return string
     */
    public function getEvidenceNumber()
    {
        return $this->evidenceNumber;
    }

    /**
     * Set number of the proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @param string $evidenceNumber Number of the proof provided by the customer. For example, the merchant gives this information to allow the certification of an electronic signature.
     *
     * @return self
     */
    public function setEvidenceNumber(string $evidenceNumber)
    {
        $this->evidenceNumber = $evidenceNumber;

        return $this;
    }

    /**
     * Get yYYYMMDD.
     *
     * @return string
     */
    public function getEvidenceAcquisitionDate()
    {
        return $this->evidenceAcquisitionDate;
    }

    /**
     * Set yYYYMMDD.
     *
     * @param string $evidenceAcquisitionDate YYYYMMDD
     *
     * @return self
     */
    public function setEvidenceAcquisitionDate(string $evidenceAcquisitionDate)
    {
        $this->evidenceAcquisitionDate = $evidenceAcquisitionDate;

        return $this;
    }

    /**
     * Get additional reference of the holder that is communicated to the acquirer system or the issuer system in order to make some additional dedicated checks.
     *
     * @return string
     */
    public function getHolderAdditionalReference()
    {
        return $this->holderAdditionalReference;
    }

    /**
     * Set additional reference of the holder that is communicated to the acquirer system or the issuer system in order to make some additional dedicated checks.
     *
     * @param string $holderAdditionalReference additional reference of the holder that is communicated to the acquirer system or the issuer system in order to make some additional dedicated checks
     *
     * @return self
     */
    public function setHolderAdditionalReference(string $holderAdditionalReference)
    {
        $this->holderAdditionalReference = $holderAdditionalReference;

        return $this;
    }

    /**
     * Get random value (called a seed) provided by the merchant to calculate the hashPan.
     *
     * @return string
     */
    public function getHashSalt2()
    {
        return $this->hashSalt2;
    }

    /**
     * Set random value (called a seed) provided by the merchant to calculate the hashPan.
     *
     * @param string $hashSalt2 random value (called a seed) provided by the merchant to calculate the hashPan
     *
     * @return self
     */
    public function setHashSalt2(string $hashSalt2)
    {
        $this->hashSalt2 = $hashSalt2;

        return $this;
    }

    /**
     * Get random value (called a seed) provided by the merchant to calculate the hashPan.
     *
     * @return string
     */
    public function getHashSalt1()
    {
        return $this->hashSalt1;
    }

    /**
     * Set random value (called a seed) provided by the merchant to calculate the hashPan.
     *
     * @param string $hashSalt1 random value (called a seed) provided by the merchant to calculate the hashPan
     *
     * @return self
     */
    public function setHashSalt1(string $hashSalt1)
    {
        $this->hashSalt1 = $hashSalt1;

        return $this;
    }

    /**
     * Get cryptographic function used to calculate the hashPan.
     *
     * @return string
     */
    public function getHashAlgorithm2()
    {
        return $this->hashAlgorithm2;
    }

    /**
     * Set cryptographic function used to calculate the hashPan.
     *
     * @param string $hashAlgorithm2 cryptographic function used to calculate the hashPan
     *
     * @return self
     */
    public function setHashAlgorithm2(string $hashAlgorithm2)
    {
        $this->hashAlgorithm2 = $hashAlgorithm2;

        return $this;
    }

    /**
     * Get cryptographic function used to calculate the hashPan.
     *
     * @return string
     */
    public function getHashAlgorithm1()
    {
        return $this->hashAlgorithm1;
    }

    /**
     * Set cryptographic function used to calculate the hashPan.
     *
     * @param string $hashAlgorithm1 cryptographic function used to calculate the hashPan
     *
     * @return self
     */
    public function setHashAlgorithm1(string $hashAlgorithm1)
    {
        $this->hashAlgorithm1 = $hashAlgorithm1;

        return $this;
    }

    /**
     * Get contains the payment mean holder's information.
     *
     * @return string
     */
    public function getHolderData()
    {
        return $this->holderData;
    }

    /**
     * Set contains the payment mean holder's information.
     *
     * @param string $holderData contains the payment mean holder's information
     *
     * @return self
     */
    public function setHolderData(string $holderData)
    {
        $this->holderData = $holderData;

        return $this;
    }

    /**
     * Get contains the information making it possible to make a payment in instalments.
     *
     * @return string
     */
    public function getInstalmentData()
    {
        return $this->instalmentData;
    }

    /**
     * Set contains the information making it possible to make a payment in instalments.
     *
     * @param string $instalmentData contains the information making it possible to make a payment in instalments
     *
     * @return self
     */
    public function setInstalmentData(string $instalmentData)
    {
        $this->instalmentData = $instalmentData;

        return $this;
    }

    /**
     * Get invoice reference.
     *
     * @return string
     */
    public function getInvoiceReference()
    {
        return $this->invoiceReference;
    }

    /**
     * Set invoice reference.
     *
     * @param string $invoiceReference invoice reference
     *
     * @return self
     */
    public function setInvoiceReference(string $invoiceReference)
    {
        $this->invoiceReference = $invoiceReference;

        return $this;
    }

    /**
     * Get mandate number.
     *
     * @return string
     */
    public function getMandateId()
    {
        return $this->mandateId;
    }

    /**
     * Set mandate number.
     *
     * @param string $mandateId mandate number
     *
     * @return self
     */
    public function setMandateId(string $mandateId)
    {
        $this->mandateId = $mandateId;

        return $this;
    }

    /**
     * Get if indicated in the payment request, allows to change the name displayed on the 3-D Secure authentication page.
     *
     * @return string
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * Set if indicated in the payment request, allows to change the name displayed on the 3-D Secure authentication page.
     *
     * @param string $merchantName if indicated in the payment request, allows to change the name displayed on the 3-D Secure authentication page
     *
     * @return self
     */
    public function setMerchantName(string $merchantName)
    {
        $this->merchantName = $merchantName;

        return $this;
    }

    /**
     * Get merchant's session number. Allows consolidation between requests and responses.
     *
     * @return string
     */
    public function getMerchantSessionId()
    {
        return $this->merchantSessionId;
    }

    /**
     * Set merchant's session number. Allows consolidation between requests and responses.
     *
     * @param string $merchantSessionId Merchant's session number. Allows consolidation between requests and responses.
     *
     * @return self
     */
    public function setMerchantSessionId(string $merchantSessionId)
    {
        $this->merchantSessionId = $merchantSessionId;

        return $this;
    }

    /**
     * Get date time ISO8601.
     *
     * @return string
     */
    public function getMerchantTransactionDateTime()
    {
        return $this->merchantTransactionDateTime;
    }

    /**
     * Set date time ISO8601.
     *
     * @param string $merchantTransactionDateTime date time ISO8601
     *
     * @return self
     */
    public function setMerchantTransactionDateTime(string $merchantTransactionDateTime)
    {
        $this->merchantTransactionDateTime = $merchantTransactionDateTime;

        return $this;
    }

    /**
     * Get merchant web site URL.
     *
     * @return string
     */
    public function getMerchantUrl()
    {
        return $this->merchantUrl;
    }

    /**
     * Set merchant web site URL.
     *
     * @param string $merchantUrl merchant web site URL
     *
     * @return self
     */
    public function setMerchantUrl(string $merchantUrl)
    {
        $this->merchantUrl = $merchantUrl;

        return $this;
    }

    /**
     * Get contains specific information regarding the order context.
     *
     * @return string
     */
    public function getOrderContext()
    {
        return $this->orderContext;
    }

    /**
     * Set contains specific information regarding the order context.
     *
     * @param string $orderContext Contains specific information regarding the order context
     *
     * @return self
     */
    public function setOrderContext(string $orderContext)
    {
        $this->orderContext = $orderContext;

        return $this;
    }

    /**
     * Get type of payment (per operation, 1st recurring payment etc).
     *
     * @return string
     */
    public function getPaymentPattern()
    {
        return $this->paymentPattern;
    }

    /**
     * Set type of payment (per operation, 1st recurring payment etc).
     *
     * @param string $paymentPattern type of payment (per operation, 1st recurring payment etc)
     *
     * @return self
     */
    public function setPaymentPattern(string $paymentPattern)
    {
        $this->paymentPattern = $paymentPattern;

        return $this;
    }

    /**
     * Get contains specific information regarding the payment method used by the buyer.
     *
     * @return string
     */
    public function getPaymentMeanData()
    {
        return $this->paymentMeanData;
    }

    /**
     * Set contains specific information regarding the payment method used by the buyer.
     *
     * @param string $paymentMeanData contains specific information regarding the payment method used by the buyer
     *
     * @return self
     */
    public function setPaymentMeanData(string $paymentMeanData)
    {
        $this->paymentMeanData = $paymentMeanData;

        return $this;
    }

    /**
     * Get list of merchant privative information transmitted by the a Business Score scoring system.
     *
     * @return string
     */
    public function getRiskManagementCustomDataList()
    {
        return $this->riskManagementCustomDataList;
    }

    /**
     * Set list of merchant privative information transmitted by the a Business Score scoring system.
     *
     * @param string $riskManagementCustomDataList list of merchant privative information transmitted by the a Business Score scoring system
     *
     * @return self
     */
    public function setRiskManagementCustomDataList(string $riskManagementCustomDataList)
    {
        $this->riskManagementCustomDataList = $riskManagementCustomDataList;

        return $this;
    }

    /**
     * Get attention : the following characters "|", "«", "»", and «"» are forbidden in this field. If they are used, they will be replaced by blanks.
     *
     * @return string
     */
    public function getReturnContext()
    {
        return $this->returnContext;
    }

    /**
     * Set attention : the following characters "|", "«", "»", and «"» are forbidden in this field. If they are used, they will be replaced by blanks.
     *
     * @param string $returnContext Attention : the following characters "|", "«", "»", and «"» are forbidden in this field. If they are used, they will be replaced by blanks
     *
     * @return self
     */
    public function setReturnContext(string $returnContext)
    {
        $this->returnContext = $returnContext;

        return $this;
    }

    /**
     * Get identifier of the merchant's secret key used to calculate the imprint of the response.
     *
     * @return int
     */
    public function getResponseKeyVersion()
    {
        return $this->responseKeyVersion;
    }

    /**
     * Set identifier of the merchant's secret key used to calculate the imprint of the response.
     *
     * @param int $responseKeyVersion identifier of the merchant's secret key used to calculate the imprint of the response
     *
     * @return self
     */
    public function setResponseKeyVersion($responseKeyVersion)
    {
        $this->responseKeyVersion = $responseKeyVersion;

        return $this;
    }

    /**
     * Get encoding type of the response expected by the merchant.
     *
     * @return string
     */
    public function getResponseEncoding()
    {
        return $this->responseEncoding;
    }

    /**
     * Set encoding type of the response expected by the merchant.
     *
     * @param string $responseEncoding encoding type of the response expected by the merchant
     *
     * @return self
     */
    public function setResponseEncoding(string $responseEncoding)
    {
        $this->responseEncoding = $responseEncoding;

        return $this;
    }

    /**
     * Get information specific to the basket.
     *
     * @return ShoppingCartDetail
     */
    public function getShoppingCartDetail()
    {
        return $this->shoppingCartDetail;
    }

    /**
     * Set information specific to the basket.
     *
     * @param ShoppingCartDetail $shoppingCartDetail information specific to the basket
     *
     * @return self
     */
    public function setShoppingCartDetail(ShoppingCartDetail $shoppingCartDetail)
    {
        $this->shoppingCartDetail = $shoppingCartDetail;

        return $this;
    }

    /**
     * Get contains address information of a merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @return Address
     */
    public function getSubMerchantAddress()
    {
        return $this->subMerchantAddress;
    }

    /**
     * Set contains address information of a merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @param Address $subMerchantAddress contains address information of a merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer
     *
     * @return self
     */
    public function setSubMerchantAddress(Address $subMerchantAddress)
    {
        $this->subMerchantAddress = $subMerchantAddress;

        return $this;
    }

    /**
     * Get mCC Code of the vendor at the Payment Facilitator in a context of Collecting offer or a Marketplace offer.
     *
     * @return string
     */
    public function getSubMerchantCategoryCode()
    {
        return $this->subMerchantCategoryCode;
    }

    /**
     * Set mCC Code of the vendor at the Payment Facilitator in a context of Collecting offer or a Marketplace offer.
     *
     * @param string $subMerchantCategoryCode MCC Code of the vendor at the Payment Facilitator in a context of Collecting offer or a Marketplace offer
     *
     * @return self
     */
    public function setSubMerchantCategoryCode(string $subMerchantCategoryCode)
    {
        $this->subMerchantCategoryCode = $subMerchantCategoryCode;

        return $this;
    }

    /**
     * Get merchant contract number of the Payment Facilitator in the context of Collecting offer or a Marketplace offer (only used for Cetelem).
     *
     * @return string
     */
    public function getSubMerchantContractNumber()
    {
        return $this->subMerchantContractNumber;
    }

    /**
     * Set merchant contract number of the Payment Facilitator in the context of Collecting offer or a Marketplace offer (only used for Cetelem).
     *
     * @param string $subMerchantContractNumber merchant contract number of the Payment Facilitator in the context of Collecting offer or a Marketplace offer (only used for Cetelem)
     *
     * @return self
     */
    public function setSubMerchantContractNumber(string $subMerchantContractNumber)
    {
        $this->subMerchantContractNumber = $subMerchantContractNumber;

        return $this;
    }

    /**
     * Get merchant identifier of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @return string
     */
    public function getSubMerchantId()
    {
        return $this->subMerchantId;
    }

    /**
     * Set merchant identifier of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @param string $subMerchantId merchant identifier of the Payment Facilitator in the context of Collecting offer or a Marketplace offer
     *
     * @return self
     */
    public function setSubMerchantId(string $subMerchantId)
    {
        $this->subMerchantId = $subMerchantId;

        return $this;
    }

    /**
     * Get legal identifier of vendor as merchant of the Payment Facilitator, expressed in the legal codification specific to each country.
     *
     * @return string
     */
    public function getSubMerchantLegalId()
    {
        return $this->subMerchantLegalId;
    }

    /**
     * Set legal identifier of vendor as merchant of the Payment Facilitator, expressed in the legal codification specific to each country.
     *
     * @param string $subMerchantLegalId legal identifier of vendor as merchant of the Payment Facilitator, expressed in the legal codification specific to each country
     *
     * @return self
     */
    public function setSubMerchantLegalId(string $subMerchantLegalId)
    {
        $this->subMerchantLegalId = $subMerchantLegalId;

        return $this;
    }

    /**
     * Get name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @return string
     */
    public function getSubMerchantName()
    {
        return $this->subMerchantName;
    }

    /**
     * Set name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @param string $subMerchantName name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer
     *
     * @return self
     */
    public function setSubMerchantName(string $subMerchantName)
    {
        $this->subMerchantName = $subMerchantName;

        return $this;
    }

    /**
     * Get short name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @return string
     */
    public function getSubMerchantShortName()
    {
        return $this->subMerchantShortName;
    }

    /**
     * Set short name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer.
     *
     * @param string $subMerchantShortName short name of the merchant of the Payment Facilitator in the context of Collecting offer or a Marketplace offer
     *
     * @return self
     */
    public function setSubMerchantShortName(string $subMerchantShortName)
    {
        $this->subMerchantShortName = $subMerchantShortName;

        return $this;
    }

    /**
     * Get indicates the players in the transaction.
     *
     * @return string
     */
    public function getTransactionActors()
    {
        return $this->transactionActors;
    }

    /**
     * Set indicates the players in the transaction.
     *
     * @param string $transactionActors indicates the players in the transaction
     *
     * @return self
     */
    public function setTransactionActors(string $transactionActors)
    {
        $this->transactionActors = $transactionActors;

        return $this;
    }

    /**
     * Get origin of a transaction (for example: name of the programme), set by the merchant. Exemple: "Website A v1.32".
     *
     * @return string
     */
    public function getTransactionOrigin()
    {
        return $this->transactionOrigin;
    }

    /**
     * Set origin of a transaction (for example: name of the programme), set by the merchant. Exemple: "Website A v1.32".
     *
     * @param string $transactionOrigin Origin of a transaction (for example: name of the programme), set by the merchant. Exemple: "Website A v1.32".
     *
     * @return self
     */
    public function setTransactionOrigin(string $transactionOrigin)
    {
        $this->transactionOrigin = $transactionOrigin;

        return $this;
    }

    /**
     * Get contains specific information regarding the travel.
     *
     * @return string
     */
    public function getTravelContext()
    {
        return $this->travelContext;
    }

    /**
     * Set contains specific information regarding the travel.
     *
     * @param string $travelContext contains specific information regarding the travel
     *
     * @return self
     */
    public function setTravelContext(string $travelContext)
    {
        $this->travelContext = $travelContext;

        return $this;
    }

    /**
     * Get yYYYMMDD.
     *
     * @return string
     */
    public function getValueDate()
    {
        return $this->valueDate;
    }

    /**
     * Set yYYYMMDD.
     *
     * @param string $valueDate YYYYMMDD
     *
     * @return self
     */
    public function setValueDate(string $valueDate)
    {
        $this->valueDate = $valueDate;

        return $this;
    }
}
