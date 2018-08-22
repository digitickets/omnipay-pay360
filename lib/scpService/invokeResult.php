<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      7d4e059805c91e1588cdf41a6184f785
 */
class scpService_invokeResult
{
    /**
     * @var string $status One of the constants defined in scpService_status
     */
    public $status;

    /**
     * @var token $redirectUrl
     */
    public $redirectUrl;

    /**
     * @var scpService_errorDetails $errorDetails
     */
    public $errorDetails;
}
