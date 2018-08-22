<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      01e31a7929611954b0c8d97908d1f1cc
 */
class scpService_storedCardDetails
{
    /**
     * @var scpService_storedCardKey $storedCardKey
     */
    public $storedCardKey;

    /**
     * @var string $cardDescription One of the constants defined in scpService_cardDescription
     */
    public $cardDescription;

    /**
     * @var string $cardType One of the constants defined in scpService_cardType
     */
    public $cardType;

    /**
     * @basetype generalDateMMYY
     * @pattern  (([1][0-2])|([0][1-9]))[0-9][0-9]
     *
     * @var      string $expiryDate
     */
    public $expiryDate;
}
