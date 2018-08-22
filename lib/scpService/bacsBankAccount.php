<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      7871c1e5fd699b9141e077206c5ee44d
 */
class scpService_bacsBankAccount
{
    /**
     * @basetype bankSortCode
     * @pattern  [0-9]{6}
     *
     * @var      token $sortCode
     */
    public $sortCode;

    /**
     * @basetype bankAccountNumber
     * @pattern  [0-9]{8}
     *
     * @var      token $bacsAccountNumber
     */
    public $bacsAccountNumber;
}
