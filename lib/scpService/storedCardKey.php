<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      5026c29f2c516342f337f76b1b89847e
 */
class scpService_storedCardKey
{
    /**
     * @var string $token
     */
    public $token;

    /**
     * @basetype cardLastFourDigits
     * @pattern  [0-9][0-9][0-9][0-9]
     *
     * @var      string $lastFourDigits
     */
    public $lastFourDigits;
}
