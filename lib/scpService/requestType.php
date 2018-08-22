<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      b6da7ca46a86a3502118bbf18e9d1dfe
 */
class scpService_requestType
{
    /**
     * @value payOnly
     */
    const PAY_ONLY = 'payOnly';

    /**
     * @value authoriseOnly
     */
    const AUTHORISE_ONLY = 'authoriseOnly';

    /**
     * @value authoriseAndStore
     */
    const AUTHORISE_AND_STORE = 'authoriseAndStore';

    /**
     * @value authoriseAndAutoStore
     */
    const AUTHORISE_AND_AUTO_STORE = 'authoriseAndAutoStore';

    /**
     * @value storeOnly
     */
    const STORE_ONLY = 'storeOnly';

    /**
     * @value payAndStore
     */
    const PAY_AND_STORE = 'payAndStore';

    /**
     * @value payAndAutoStore
     */
    const PAY_AND_AUTO_STORE = 'payAndAutoStore';
}
