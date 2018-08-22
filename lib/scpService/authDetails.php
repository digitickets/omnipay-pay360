<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      5ae5cd65f8cd0309dafb03b602c20afa
 */
class scpService_authDetails
{
    /**
     * @basetype generalString
     *
     * @var      string $authCode
     */
    public $authCode;

    /**
     * @basetype generalAmount
     *
     * @var      int $amountInMinorUnits
     */
    public $amountInMinorUnits;

    /**
     * @basetype maskedCardNumber
     * @pattern  [0-9]{6}\*+[0-9]{4}
     *
     * @var      string $maskedCardNumber
     */
    public $maskedCardNumber;

    /**
     * @var string $cardDescription One of the constants defined in scpService_cardDescription
     */
    public $cardDescription;

    /**
     * @var string $cardType One of the constants defined in scpService_cardType
     */
    public $cardType;

    /**
     * @basetype generalString
     *
     * @var      string $merchantNumber
     */
    public $merchantNumber;

    /**
     * @basetype generalDateMMYY
     * @pattern  (([1][0-2])|([0][1-9]))[0-9][0-9]
     *
     * @var      string $expiryDate
     */
    public $expiryDate;

    /**
     * @basetype generalSequenceNumber
     *
     * @var      positiveInteger $continuousAuditNumber
     */
    public $continuousAuditNumber;

    /**
     * @basetype isoCountryCode
     *
     * @var      string $isoCountryCode
     */
    public $isoCountryCode;

    /**
     * @basetype generalString
     *
     * @var      string $derivedMerchantName
     */
    public $derivedMerchantName;
}
