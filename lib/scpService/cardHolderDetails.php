<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      d6a54004cd2d8cc86f75a5084e74c052
 */
class scpService_cardHolderDetails
{
    /**
     * @basetype generalString
     *
     * @var      string $cardHolderName
     */
    public $cardHolderName;

    /**
     * @var scpService_address $address
     */
    public $address;

    /**
     * @var scpService_contact $contact
     */
    public $contact;

    /**
     * @basetype isoCountryCode
     *
     * @var      string $isoCountryCode
     */
    public $isoCountryCode;
}
