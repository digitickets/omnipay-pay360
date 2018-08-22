<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      52d83dd270c382b438209402a20675b4
 */
class scpService_bankDetails extends scpService_bacsBankAccount
{
    /**
     * @basetype bacsReference
     * @pattern  [A-Za-z0-9.\-/& ]{1,18}
     *
     * @var      string $bacsReference
     */
    public $bacsReference;
}
