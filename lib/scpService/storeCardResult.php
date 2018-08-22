<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      179c5f5e40b0dc7b36314a86ec86ad3d
 */
class scpService_storeCardResult
{
    /**
     * @var string $status One of the constants defined in scpService_status
     */
    public $status;

    /**
     * @var scpService_storedCardDetails $storedCardDetails
     */
    public $storedCardDetails;

    /**
     * @var scpService_errorDetails $errorDetails
     */
    public $errorDetails;

    /**
     * @basetype isoCountryCode
     *
     * @var      string $isoCountryCode
     */
    public $isoCountryCode;
}
