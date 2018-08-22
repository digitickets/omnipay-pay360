<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      f190ee27aa7e947157c20eb2bdbef624
 */
class scpService_lgItemDetails
{
    /**
     * @basetype generalCode
     *
     * @var      string $fundCode
     */
    public $fundCode;

    /**
     * @basetype boolean
     *
     * @var      bool $isFundItem
     */
    public $isFundItem;

    /**
     * @basetype generalString
     *
     * @var      string $additionalReference
     */
    public $additionalReference;

    /**
     * @basetype generalString
     *
     * @var      string $narrative
     */
    public $narrative;

    /**
     * @var scpService_threePartName $accountName
     */
    public $accountName;

    /**
     * @var scpService_address $accountAddress
     */
    public $accountAddress;

    /**
     * @var scpService_contact $contact
     */
    public $contact;
}
