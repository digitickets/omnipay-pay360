<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      72d95c4bbd2b4089d89545dc442eae67
 */
class scpService_routing
{
    /**
     * @basetype returnUrl
     *
     * @var      union $returnUrl
     */
    public $returnUrl;

    /**
     * @basetype httpUrl
     * @pattern  https?://.+
     *
     * @var      token $backUrl
     */
    public $backUrl;

    /**
     * @basetype httpUrl
     * @pattern  https?://.+
     *
     * @var      token $errorUrl
     */
    public $errorUrl;

    /**
     * @var int $siteId
     */
    public $siteId;

    /**
     * @var int $scpId
     */
    public $scpId;
}
