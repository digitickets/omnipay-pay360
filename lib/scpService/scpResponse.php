<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      f8fa55e1352a494dcb767e9238631b39
 */
class scpService_scpResponse
{
    /**
     * @var token $requestId
     */
    public $requestId;

    /**
     * @var string $scpReference
     */
    public $scpReference;

    /**
     * @var string $transactionState One of the constants defined in scpService_transactionState
     */
    public $transactionState;
}
