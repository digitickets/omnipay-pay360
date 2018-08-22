<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      5835accc39fbbd990853553a34424773
 */
class scpService_nonCardPayment
{
    /**
     * @basetype generalAmount
     *
     * @var      int $amountInMinorUnits
     */
    public $amountInMinorUnits;

    /**
     * @basetype generalSequenceNumber
     *
     * @var      positiveInteger $continuousAuditNumber
     */
    public $continuousAuditNumber;

    /**
     * @basetype generalString
     *
     * @var      string $paymentType
     */
    public $paymentType;

    /**
     * @basetype generalString
     *
     * @var      string $paymentProviderReference
     */
    public $paymentProviderReference;
}
