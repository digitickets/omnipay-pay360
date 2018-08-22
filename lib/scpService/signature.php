<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      daa5888c8b005a74df2f53d21f4e320d
 */
class scpService_signature
{
    /**
     * @var string $algorithm One of the constants defined in scpService_algorithm
     */
    public $algorithm;

    /**
     * @var int $hmacKeyID
     */
    public $hmacKeyID;

    /**
     * @var string $digest
     */
    public $digest;
}
