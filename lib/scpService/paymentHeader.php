<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      f94edcd6a935ba6d1bd677ad15c9b5dd
 */
class scpService_paymentHeader
{
    /**
     * @basetype generalDate
     *
     * @var      dateTime $transactionDate
     */
    public $transactionDate;

    /**
     * @basetype generalCode
     *
     * @var      string $machineCode
     */
    public $machineCode;

    /**
     * @basetype uniqueTranId
     *
     * @var      string $uniqueTranId
     */
    public $uniqueTranId;
}
