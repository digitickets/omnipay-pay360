<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      67c857ad223f1f84ec5ad65a920ee54f
 */
class scpService_itemBase
{
    /**
     * @var scpService_summaryData $itemSummary
     */
    public $itemSummary;

    /**
     * @var scpService_taxItem $tax
     */
    public $tax;

    /**
     * @basetype generalShort
     *
     * @var      short $quantity
     */
    public $quantity;

    /**
     * @var scpService_notificationEmails $notificationEmails
     */
    public $notificationEmails;

    /**
     * @var scpService_lgItemDetails $lgItemDetails
     */
    public $lgItemDetails;

    /**
     * @var scpService_customerInfo $customerInfo
     */
    public $customerInfo;

    /**
     * @basetype lineId
     *
     * @var      token $lineId
     */
    public $lineId;
}
