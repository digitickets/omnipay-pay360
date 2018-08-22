<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      4ba8ce37342af59bf6a072199d285b5e
 */
class scpService_scpInvokeRequest extends scpService_requestWithCredentials
{
    /**
     * @var token $requestType One of the constants defined in scpService_requestType
     */
    public $requestType;

    /**
     * @var token $requestId
     */
    public $requestId;

    /**
     * @var scpService_routing $routing
     */
    public $routing;

    /**
     * @var string $panEntryMethod One of the constants defined in scpService_panEntryMethod
     */
    public $panEntryMethod;

    /**
     * @var scpService_additionalInstructions $additionalInstructions
     */
    public $additionalInstructions;

    /**
     * @var scpService_billingDetails $billing
     */
    public $billing;

    /**
     * @var scpService_nonPaymentData $nonPaymentData
     */
    public $nonPaymentData;
}
