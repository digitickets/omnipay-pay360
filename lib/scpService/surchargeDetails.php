<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      1938085a159046c72c4f16ad75fa8cae
 */
class scpService_surchargeDetails
{
    /**
     * @basetype generalCode
     *
     * @var      string $fundCode
     */
    public $fundCode;

    /**
     * @basetype generalString
     *
     * @var      string $reference
     */
    public $reference;

    /**
     * @basetype generalAmount
     *
     * @var      int $amountInMinorUnits
     */
    public $amountInMinorUnits;

    /**
     * @var scpService_surchargeBasis $surchargeBasis
     */
    public $surchargeBasis;

    /**
     * @basetype generalSequenceNumber
     *
     * @var      positiveInteger $continuousAuditNumber
     */
    public $continuousAuditNumber;

    /**
     * @basetype generalAmount
     *
     * @var      int $vatAmountInMinorUnits
     */
    public $vatAmountInMinorUnits;
}
