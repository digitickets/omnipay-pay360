<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      f7b9449d1acf193820bbc9b47c104f01
 */
class scpService_surchargeItemDetails
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
     * @var scpService_surchargeInfo $surchargeInfo
     */
    public $surchargeInfo;

    /**
     * @var scpService_taxSurcharge $tax
     */
    public $tax;
}
