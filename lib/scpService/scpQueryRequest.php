<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      68a509de0f7206483c11205d08495135
 */
class scpService_scpQueryRequest extends scpService_requestWithCredentials
{
    /**
     * @var int $siteId
     */
    public $siteId;

    /**
     * @var string $scpReference
     */
    public $scpReference;

    /**
     * @basetype boolean
     *
     * @var      bool $acceptNonCardResponseData
     */
    public $acceptNonCardResponseData;
}
