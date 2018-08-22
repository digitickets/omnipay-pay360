<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      afde6555319c72a809784c97c2eac064
 */
class scpService_cardDetails
{
    /**
     * @basetype cardNumber
     * @pattern  ([0-9]{12,19})
     *
     * @var      string $cardNumber
     */
    public $cardNumber;

    /**
     * @basetype generalDateMMYY
     * @pattern  (([1][0-2])|([0][1-9]))[0-9][0-9]
     *
     * @var      string $expiryDate
     */
    public $expiryDate;

    /**
     * @basetype generalDateMMYY
     * @pattern  (([1][0-2])|([0][1-9]))[0-9][0-9]
     *
     * @var      string $startDate
     */
    public $startDate;

    /**
     * @basetype issueNumber
     * @pattern  [0-9]?[0-9]
     *
     * @var      string $issueNumber
     */
    public $issueNumber;

    /**
     * @basetype cardSecurityCode
     * @pattern  [0-9][0-9][0-9]?[0-9]
     *
     * @var      string $cardSecurityCode
     */
    public $cardSecurityCode;
}
