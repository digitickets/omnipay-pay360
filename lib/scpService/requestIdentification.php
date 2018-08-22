<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      c6914c16bd820ff41002a8511d9e6b63
 */
class scpService_requestIdentification
{
    /**
     * @var string $uniqueReference
     */
    public $uniqueReference;

    /**
     * @basetype timeStamp
     * @pattern  (20)\d\d(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])([0-1]\d|2[0-3])([0-5]\d)([0-5]\d)
     *
     * @var      string $timeStamp
     */
    public $timeStamp;
}
