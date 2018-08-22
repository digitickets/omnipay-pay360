<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      4257a95b2e1d36a434530d35c31732b7
 */
class scpService_contact
{
    /**
     * @basetype phone
     * @pattern  |\+[1-9][0-9]{8}[0-9]?[0-9]?[0-9]?[0-9]?[0-9]?[0-9]?
     *
     * @var      string $telephone
     */
    public $telephone;

    /**
     * @basetype phone
     * @pattern  |\+[1-9][0-9]{8}[0-9]?[0-9]?[0-9]?[0-9]?[0-9]?[0-9]?
     *
     * @var      string $mobile
     */
    public $mobile;

    /**
     * @basetype email
     * @pattern  [^@]+@[^@]+
     *
     * @var      string $email
     */
    public $email;
}
