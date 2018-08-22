<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      7c0eecb660a6cdbd733d2bae2eb5222d
 */
class scpService_notificationEmails
{
    /**
     * @basetype email
     * @pattern  [^@]+@[^@]+
     *
     * @var      string[] $email
     * @range Between 0 and 5
     */
    public $email;

    /**
     * @basetype generalLongString
     *
     * @var      string $additionalEmailMessage
     */
    public $additionalEmailMessage;
}
