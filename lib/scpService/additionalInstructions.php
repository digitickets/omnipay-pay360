<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      240611c2f1e200245dd8cdd1c6e2bf95
 */
class scpService_additionalInstructions
{
    /**
     * @basetype generalCode
     *
     * @var      string $merchantCode
     */
    public $merchantCode;

    /**
     * @basetype isoCode
     * @pattern  [0-9]{3}
     *
     * @var      string $countryCode
     */
    public $countryCode;

    /**
     * @basetype isoCode
     * @pattern  [0-9]{3}
     *
     * @var      string $currencyCode
     */
    public $currencyCode;

    /**
     * @var scpService_acceptedCards $acceptedCards
     */
    public $acceptedCards;

    /**
     * @basetype languageCode
     * @length   2
     *
     * @var      string $language
     */
    public $language;

    /**
     * @var scpService_stageIndicator $stageIndicator
     */
    public $stageIndicator;

    /**
     * @var string $responseInterface One of the constants defined in scpService_responseInterface
     */
    public $responseInterface;

    /**
     * @basetype generalString
     *
     * @var      string $cardholderID
     */
    public $cardholderID;

    /**
     * @var positiveInteger $integrator
     */
    public $integrator;

    /**
     * @basetype generalCode
     *
     * @var      string $styleCode
     */
    public $styleCode;

    /**
     * @basetype generalCode
     *
     * @var      string $frameworkCode
     */
    public $frameworkCode;

    /**
     * @basetype generalCode
     *
     * @var      string $systemCode
     */
    public $systemCode;

    /**
     * @var scpService_walletRequest $walletRequest
     */
    public $walletRequest;

    /**
     * @var scpService_recurringPayments $recurringPayments
     */
    public $recurringPayments;
}
