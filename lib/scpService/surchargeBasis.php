<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      d0c5b65bbc03d6d8eda1f0016a4ba982
 */
class scpService_surchargeBasis
{
    /**
     * @basetype generalAmountPositive
     *
     * @var      positiveInteger $surchargeFixed
     */
    public $surchargeFixed;

    /**
     * @basetype generalDecimalPositive
     *
     * @var      generalDecimal $surchargeRate
     */
    public $surchargeRate;
}
