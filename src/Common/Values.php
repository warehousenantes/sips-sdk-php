<?php

namespace Worldline\Sips\Values\PanType {

    const CSE = 'CSE';              // The PAN provided is encrypted by CSE Javascript library (Client Side Encryption)
    const PAN = 'PAN';              // The PAN is provided in clear text
    const TOKEN_PAN = 'TOKEN_PAN';  // The PAN provided is a token

}

namespace Worldline\Sips\Values\CscType {

    const CSE = 'CSE';              // The CSC (Card Security Code) provided is encrypted by the CSE (Client Side Encryption) Javascript library
    const PLAIN = 'PLAIN';          // The CSC (Card Security Code) is provided in clear text. It is the default value

}

namespace Worldline\Sips\Values\paymentMeanBrandSelectionStatus {

    const DEFAULT_MODE = 'APPLIED_DEFAULT';     // The cardholder accepted the default merchant choice
    const HOLDER = 'APPLIED_HOLDER';            // The cardholder selected a card brand different from the default merchant choice
    const NOT_APPLICABLE = 'NOT_APPLICABLE';    // Card number filled is not a cobadged card

}

namespace Worldline\Sips\Values\paymentPattern {

    const ONE_SHOT = 'ONE_SHOT';        // One shot payment (default value)
    const ISNTALMENT = 'INSTALMENT';    // Payment by instalment
    const RECURRING_1 = 'RECURRING_1';  // Recurring payment first payment
    const RECURRING_N = 'RECURRING_N';  // Recurring payment nth payment

}

namespace Worldline\Sips\Values\merchantCustomerAuthentMethod {

    const NOAUTHENT = 'NOAUTHENT';          //	No authentication of the customer by the merchant
    const OWNCREDENTIAL = 'OWNCREDENTIAL';  // 	Customer authentication by the merchant using his own system
    const FEDERATEDID = 'FEDERATEDID';      // 	Customer authentication by the merchant using an identifier federated (facebook, ...) (e.g. Facebook)
    const ISSUERID = 'ISSUERID';            // 	Customer authentication by the merchant using information of the issuer's payment mean
    const THIRDPARTY = 'THIRDPARTY';        // 	Customer authentication by the merchant using a third system
    const FIDO = 'FIDO';                    // 	Customer authentication by the merchant with FIDO (Fast IDentity Online) system

}

namespace Worldline\Sips\Values\challengeMode3DS {

    const CHALLENGE = 'CHALLENGE';                          // The merchant desired authentication challenge mode is to have a client authentication. In other words, it is a "challenge" request
    const CHALLENGE_MANDATE = 'CHALLENGE_MANDATE';          // The merchant need is to apply the regulatory mode to have a strong customer authentication (for example for the first payment of payment schedule)
    const NO_CHALLENGE = 'NO_CHALLENGE';                    // The merchant desired authentication challenge mode is to have no customer authentication. In other words, it is a "challenge" request
    const NO_CHALLENGE_TRA_ACQ = 'NO_CHALLENGE_TRA_ACQ';    // The merchant desired no authentication of the cardholder by invoking the TRA acquirer exemption. It's a request for "Frictionless".
    const NO_PREFERENCE = 'NO_PREFERENCE';                  // The merchant has no desired authentication challenge mode

}

namespace Worldline\Sips\Values\Country {

    const ARUBA = 'ABW';
    const AFGHANISTAN = 'AFG';
    const ANGOLA = 'AGO';
    const ANGUILLA = 'AIA';
    const ALAND_ISLANDS = 'ALA';
    const ALBANIA = 'ALB';
    const ANDORRA = 'AND';
    const UNITED_ARAB_EMIRATES = 'ARE';
    const ARGENTINA = 'ARG';
    const ARMENIA = 'ARM';
    const AMERICAN_SAMOA = 'ASM';
    const ANTARCTICA = 'ATA';
    const FRENCH_SOUTHERN_TERRITORIES = 'ATF';
    const ANTIGUA_AND_BARBUDA = 'ATG';
    const AUSTRALIA = 'AUS';
    const AUSTRIA = 'AUT';
    const AZERBAIJAN = 'AZE';
    const BURUNDI = 'BDI';
    const BELGIUM = 'BEL';
    const BENIN = 'BEN';
    const BONAIRE_SINT_EUSTATIUS_AND_SABA = 'BES';
    const BURKINA_FASO = 'BFA';
    const BANGLADESH = 'BGD';
    const BULGARIA = 'BGR';
    const BAHRAIN = 'BHR';
    const BAHAMAS = 'BHS';
    const BOSNIA_AND_HERZEGOVINA = 'BIH';
    const SAINT_KITTS_AND_NEVIS = 'BLM';
    const BELARUS = 'BLR';
    const BELIZE = 'BLZ';
    const BERMUDA = 'BMU';
    const BOLIVIA_PLURINATIONAL_STATE_OF = 'BOL';
    const BRAZIL = 'BRA';
    const BARBADOS = 'BRB';
    const BRUNEI_DARUSSALAM = 'BRN';
    const BHUTAN = 'BTN';
    const BOUVET_ISLAND = 'BVT';
    const BOTSWANA = 'BWA';
    const CENTRAL_AFRICAN_REPUBLIC = 'CAF';
    const CANADA = 'CAN';
    const COCOS_KEELING_ISLANDS = 'CCK';
    const SWITZERLAND = 'CHE';
    const CHILE = 'CHL';
    const CHINA = 'CHN';
    const COTE_D_IVOIRE = 'CIV';
    const CAMEROON = 'CMR';
    const CONGO_THE_DEMOCRATIC_REPUBLIC_OF_THE = 'COD';
    const CONGO = 'COG';
    const COOK_ISLANDS = 'COK';
    const COLOMBIA = 'COL';
    const COMOROS = 'COM';
    const CAPE_VERDE = 'CPV';
    const COSTA_RICA = 'CRI';
    const CUBA = 'CUB';
    const CURACAO = 'CUW';
    const CHRISTMAS_ISLAND = 'CXR';
    const CAYMAN_ISLANDS = 'CYM';
    const CYPRUS = 'CYP';
    const CZECH_REPUBLIC = 'CZE';
    const GERMANY = 'DEU';
    const DJIBOUTI = 'DJI';
    const DOMINICA = 'DMA';
    const DENMARK = 'DNK';
    const DOMINICAN_REPUBLIC = 'DOM';
    const ALGERIA = 'DZA';
    const ECUADOR = 'ECU';
    const EGYPT = 'EGY';
    const ERITREA = 'ERI';
    const WESTERN_SAHARA = 'ESH';
    const SPAIN = 'ESP';
    const ESTONIA = 'EST';
    const ETHIOPIA = 'ETH';
    const FINLAND = 'FIN';
    const FIJI = 'FJI';
    const FALKLAND_ISLANDS_MALVINAS = 'FLK';
    const FRANCE = 'FRA';
    const FAROE_ISLANDS = 'FRO';
    const MICRONESIA_FEDERATED_STATES_OF = 'FSM';
    const GABON = 'GAB';
    const UNITED_KINGDOM = 'GBR';
    const GEORGIA = 'GEO';
    const GUERNSEY = 'GGY';
    const GHANA = 'GHA';
    const GIBRALTAR = 'GIB';
    const GUINEA = 'GIN';
    const GUADELOUPE = 'GLP';
    const GAMBIA = 'GMB';
    const GUINEA_BISSAU = 'GNB';
    const EQUATORIAL_GUINEA = 'GNQ';
    const GREECE = 'GRC';
    const GRENADA = 'GRD';
    const GREENLAND = 'GRL';
    const GUATEMALA = 'GTM';
    const FRENCH_GUIANA = 'GUF';
    const GUAM = 'GUM';
    const GUYANA = 'GUY';
    const HONG_KONG = 'HKG';
    const HEARD_ISLAND_AND_MCDONALD_ISLANDS = 'HMD';
    const HONDURAS = 'HND';
    const CROATIA = 'HRV';
    const HAITI = 'HTI';
    const HUNGARY = 'HUN';
    const INDONESIA = 'IDN';
    const ISLE_OF_MAN = 'IMN';
    const INDIA = 'IND';
    const BRITISH_INDIAN_OCEAN_TERRITORY = 'IOT';
    const IRELAND = 'IRL';
    const IRAN_ISLAMIC_REPUBLIC_OF = 'IRN';
    const IRAQ = 'IRQ';
    const ICELAND = 'ISL';
    const ISRAEL = 'ISR';
    const ITALY = 'ITA';
    const JAMAICA = 'JAM';
    const JERSEY = 'JEY';
    const JORDAN = 'JOR';
    const JAPAN = 'JPN';
    const KAZAKHSTAN = 'KAZ';
    const KENYA = 'KEN';
    const KYRGYZSTAN = 'KGZ';
    const CAMBODIA = 'KHM';
    const KIRIBATI = 'KIR';
    const SAINT_BARTH_LEMY = 'KNA';
    const KOREA_REPUBLIC_OF = 'KOR';
    const KUWAIT = 'KWT';
    const LAO_PEOPLE_S_DEMOCRATIC_REPUBLIC = 'LAO';
    const LEBANON = 'LBN';
    const LIBERIA = 'LBR';
    const LIBYA = 'LBY';
    const SAINT_HELENA_ASCENSION_AND_TRISTAN_DA_CUNHA = 'LCA';
    const LIECHTENSTEIN = 'LIE';
    const SRI_LANKA = 'LKA';
    const LESOTHO = 'LSO';
    const LITHUANIA = 'LTU';
    const LUXEMBOURG = 'LUX';
    const LATVIA = 'LVA';
    const MACAO = 'MAC';
    const SAINT_MARTIN_FRENCH_PART = 'MAF';
    const MOROCCO = 'MAR';
    const MONACO = 'MCO';
    const MOLDOVA_REPUBLIC_OF = 'MDA';
    const MADAGASCAR = 'MDG';
    const MALDIVES = 'MDV';
    const MEXICO = 'MEX';
    const MARSHALL_ISLANDS = 'MHL';
    const MACEDONIA_THE_FORMER_YUGOSLAV_REPUBLIC_OF = 'MKD';
    const MALI = 'MLI';
    const MALTA = 'MLT';
    const MYANMAR = 'MMR';
    const MONTENEGRO = 'MNE';
    const MONGOLIA = 'MNG';
    const NORTHERN_MARIANA_ISLANDS = 'MNP';
    const MOZAMBIQUE = 'MOZ';
    const MAURITANIA = 'MRT';
    const MONTSERRAT = 'MSR';
    const MARTINIQUE = 'MTQ';
    const MAURITIUS = 'MUS';
    const MALAWI = 'MWI';
    const MALAYSIA = 'MYS';
    const MAYOTTE = 'MYT';
    const NAMIBIA = 'NAM';
    const NEW_CALEDONIA = 'NCL';
    const NIGER = 'NER';
    const NORFOLK_ISLAND = 'NFK';
    const NIGERIA = 'NGA';
    const NICARAGUA = 'NIC';
    const NIUE = 'NIU';
    const NETHERLANDS = 'NLD';
    const NORWAY = 'NOR';
    const NEPAL = 'NPL';
    const NAURU = 'NRU';
    const NEW_ZEALAND = 'NZL';
    const OMAN = 'OMN';
    const PAKISTAN = 'PAK';
    const PANAMA = 'PAN';
    const PITCAIRN = 'PCN';
    const PERU = 'PER';
    const PHILIPPINES = 'PHL';
    const PALAU = 'PLW';
    const PAPUA_NEW_GUINEA = 'PNG';
    const POLAND = 'POL';
    const PUERTO_RICO = 'PRI';
    const KOREA_DEMOCRATIC_PEOPLE_S_REPUBLIC_OF = 'PRK';
    const PORTUGAL = 'PRT';
    const PARAGUAY = 'PRY';
    const PALESTINIAN_TERRITORY_OCCUPIED = 'PSE';
    const FRENCH_POLYNESIA = 'PYF';
    const QATAR = 'QAT';
    const REUNION = 'REU';
    const ROMANIA = 'ROU';
    const RUSSIAN_FEDERATION = 'RUS';
    const RWANDA = 'RWA';
    const SAUDI_ARABIA = 'SAU';
    const SUDAN = 'SDN';
    const SENEGAL = 'SEN';
    const SINGAPORE = 'SGP';
    const SOUTH_GEORGIA_AND_THE_SOUTH_SANDWICH_ISLANDS = 'SGS';
    const SAN_MARINO = 'SHN';
    const SVALBARD_AND_JAN_MAYEN = 'SJM';
    const SOLOMON_ISLANDS = 'SLB';
    const SIERRA_LEONE = 'SLE';
    const EL_SALVADOR = 'SLV';
    const SINT_MAARTEN_DUTCH_PART = 'SMR';
    const SOMALIA = 'SOM';
    const HOLY_SEE_VATICAN_CITY_STATE = 'SPM';
    const SERBIA = 'SRB';
    const SOUTH_SUDAN = 'SSD';
    const SAO_TOME_AND_PRINCIPE = 'STP';
    const SURINAME = 'SUR';
    const SLOVAKIA = 'SVK';
    const SLOVENIA = 'SVN';
    const SWEDEN = 'SWE';
    const SWAZILAND = 'SWZ';
    const SAINT_PIERRE_AND_MIQUELON = 'SXM';
    const SEYCHELLES = 'SYC';
    const SYRIAN_ARAB_REPUBLIC = 'SYR';
    const TURKS_AND_CAICOS_ISLANDS = 'TCA';
    const CHAD = 'TCD';
    const TOGO = 'TGO';
    const THAILAND = 'THA';
    const TAJIKISTAN = 'TJK';
    const TOKELAU = 'TKL';
    const TURKMENISTAN = 'TKM';
    const TIMOR_LESTE = 'TLS';
    const TONGA = 'TON';
    const TRINIDAD_AND_TOBAGO = 'TTO';
    const TUNISIA = 'TUN';
    const TURKEY = 'TUR';
    const TUVALU = 'TUV';
    const TAIWAN_PROVINCE_OF_CHINA = 'TWN';
    const TANZANIA_UNITED_REPUBLIC_OF = 'TZA';
    const UGANDA = 'UGA';
    const UKRAINE = 'UKR';
    const UNITED_STATES_MINOR_OUTLYING_ISLANDS = 'UMI';
    const URUGUAY = 'URY';
    const UNITED_STATES = 'USA';
    const UZBEKISTAN = 'UZB';
    const SAINT_VINCENT_AND_THE_GRENADINES = 'VAT';
    const SAINT_LUCIA = 'VCT';
    const VENEZUELA_BOLIVARIAN_REPUBLIC_OF = 'VEN';
    const VIRGIN_ISLANDS_BRITISH = 'VGB';
    const VIRGIN_ISLANDS_U_S = 'VIR';
    const VIET_NAM = 'VNM';
    const VANUATU = 'VUT';
    const WALLIS_AND_FUTUNA = 'WLF';
    const SAMOA = 'WSM';
    const YEMEN = 'YEM';
    const SOUTH_AFRICA = 'ZAF';
    const ZAMBIA = 'ZMB';
    const ZIMBABWE = 'ZWE';
}

namespace Worldline\Sips\Values\Region {
    const USA_CA_HI_NV = '1';   // 	USA: California, Hawaii, Nevada
    const USA_WEST_EXCEPT_CA_HI_NV = '2';   // 	USA: West except California, Hawaii, Nevada
    const USA_CENTRAL_NORTH = '3';   // 	USA: Central North
    const USA_CENTRAL_SOUTH = '4';   // 	USA: Central South
    const USA_GREAT_LAKES = '5';   // 	USA: Great Lakes states
    const USA_SOUTH_EST = '6';   // 	USA: South East
    const USA_EXTREME_NORTH_EAST = '7';   // 	USA: Extreme North East
    const USA_NORTH_EST = '8';   // 	USA: North East
    const USA_FL_GA = '9';   // 	USA: Florida and Georgia
    const CANADA = 'A';   // 	Canada
    const SOUTH_AMERICA = 'B';   // 	South America
    const OCEANIA_ASIA = 'C';   // 	Oceania Asia
    const EUROPE = 'D';   // 	Europe
    const AFRICA_MIDDLE_EAST = 'E';   // 	Africa and middle east

}

namespace Worldline\Sips\Values\CardScheme {
    const ACCORD = 'ACCORD';            // 	Accord scheme
    const AMEX = 'AMEX';                // 	American Express scheme
    const BCMC = 'BCMC';                // 	Bancontact scheme
    const CB = 'CB';                    // 	Bank Card scheme
    const MASTERCARD = 'MASTERCARD';    // 	Mastercard scheme (Example of cards on the Mastercard scheme: Mastercard, Maestro)
    const SOFINCO = 'SOFINCO';          // 	Sofinco scheme
    const VISA = 'VISA';                // 	Visa scheme (Example of cards on the Visa scheme: Visa, Vpay, Visa Electron)
}

namespace Worldline\Sips\Values\CardCorporateIndicator {
    const YES = 'Y';    // The card is a corporate card
    const NO = 'N';     // The card is not a corporate card
}

namespace Worldline\Sips\Values\CardEffectiveDateIndicator {
    const YES = 'Y';
    const NO = 'N';
}

namespace Worldline\Sips\Values\CardSeqNumberIndicator {
    const LENGTH_1 = '1';   // 	Card issue number of length 1
    const LENGTH_2 = '2';   // 	Card issue number of length 2
    const LENGTH_3 = '3';   // 	Card issue number of length 3
    const NONE = 'N';       // 	No card issue number

}

namespace Worldline\Sips\Values\PanCheckAlgorithm {
    const LUHN_KEY = 'L';  // 	PAN control with Lühn Key algorithm
    const NO_CONTROL = 'N';  // 	No PAN control algorithm
    const VISA_MODULUS = 'V';  // 	PAN control with Visa Modulus 10 algorithm
}

namespace Worldline\Sips\Values\CardProductProfile {
    const CREDIT = 'C';  // 	Credit (pay after)
    const DEBIT = 'D';  // 	Debit (pay now)
    const CHARGE_CARD = 'H';  // 	Charge card (UK specific)
    const PREPAID = 'P';  // 	Prepaid
}

namespace Worldline\Sips\Values\VirtualCardIndicator {
    const YES = 'Y';
    const NO = 'N';
}

namespace Worldline\Sips\Values\CardProductUsageLabel {
    const COMMERCIAL = 'COMMERCIAL'; //  Business card
    const DEBIT = 'DEBIT';          // 	Debit card
    const CREDIT = 'CREDIT';        // 	Credit card
    const PREPAID = 'PREPAID';      // 	Prepaid card
}
