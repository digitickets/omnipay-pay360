<?php

/**
 * This class was created using wsdl2php.
 *
 * @wsdl2php  Wed, 22 Aug 2018 15:14:32 +0000 - Last modified
 * @WSDL      https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl
 * @Processed Wed, 22 Aug 2018 15:15:03 +0000
 * @Hash      e830b1c518ee38b4dc107b7405d37346
 */

/**
 * scpService class
 *
 * @author wsdl2php
 */
class scpService extends SoapClient
{
    /**
     * Namespace for service calls.
     */
    const SERVICE_NAMESPACE = 'http://www.capita-software-services.com/scp/simple';

    /**
     * Default class mapping for this service.
     *
     * @var array
     */
    private static $classMap = [
        'acceptedCardList' => 'scpService_acceptedCardList',
        'acceptedCardType' => 'scpService_acceptedCardType',
        'acceptedCards' => 'scpService_acceptedCards',
        'additionalInstructions' => 'scpService_additionalInstructions',
        'address' => 'scpService_address',
        'algorithm' => 'scpService_algorithm',
        'applyScpConfig' => 'scpService_applyScpConfig',
        'authDetails' => 'scpService_authDetails',
        'bacsBankAccount' => 'scpService_bacsBankAccount',
        'bankDetails' => 'scpService_bankDetails',
        'billingDetails' => 'scpService_billingDetails',
        'card' => 'scpService_card',
        'cardDescription' => 'scpService_cardDescription',
        'cardDetails' => 'scpService_cardDetails',
        'cardHolderDetails' => 'scpService_cardHolderDetails',
        'cardSurchargeRate' => 'scpService_cardSurchargeRate',
        'cardTranType' => 'scpService_cardTranType',
        'cardType' => 'scpService_cardType',
        'contact' => 'scpService_contact',
        'contactDetails' => 'scpService_contactDetails',
        'credentials' => 'scpService_credentials',
        'customerInfo' => 'scpService_customerInfo',
        'eCommerceTerminalType' => 'scpService_eCommerceTerminalType',
        'emailResult' => 'scpService_emailResult',
        'errorDetails' => 'scpService_errorDetails',
        'invokeResult' => 'scpService_invokeResult',
        'itemBase' => 'scpService_itemBase',
        'itemSummaryBase' => 'scpService_itemSummaryBase',
        'items' => 'scpService_items',
        'keySwipe' => 'scpService_keySwipe',
        'lgItemDetails' => 'scpService_lgItemDetails',
        'lgPnpDetails' => 'scpService_lgPnpDetails',
        'lgSaleDetails' => 'scpService_lgSaleDetails',
        'mcc6012' => 'scpService_mcc6012',
        'nonCardPayment' => 'scpService_nonCardPayment',
        'nonPaymentData' => 'scpService_nonPaymentData',
        'notificationEmails' => 'scpService_notificationEmails',
        'panEntryMethod' => 'scpService_panEntryMethod',
        'paymentAuthorityType' => 'scpService_paymentAuthorityType',
        'paymentBase' => 'scpService_paymentBase',
        'paymentHeader' => 'scpService_paymentHeader',
        'paymentResultBase' => 'scpService_paymentResultBase',
        'portalAction' => 'scpService_portalAction',
        'postageAndPacking' => 'scpService_postageAndPacking',
        'recordSource' => 'scpService_recordSource',
        'recurringPayments' => 'scpService_recurringPayments',
        'requestIdentification' => 'scpService_requestIdentification',
        'requestType' => 'scpService_requestType',
        'requestWithCredentials' => 'scpService_requestWithCredentials',
        'responseInterface' => 'scpService_responseInterface',
        'routing' => 'scpService_routing',
        'saleBase' => 'scpService_saleBase',
        'scpInvokeRequest' => 'scpService_scpInvokeRequest',
        'scpInvokeResponse' => 'scpService_scpInvokeResponse',
        'scpQueryRequest' => 'scpService_scpQueryRequest',
        'scpQueryResponse' => 'scpService_scpQueryResponse',
        'scpResponse' => 'scpService_scpResponse',
        'scpSimpleInvokeRequest' => 'scpService_scpSimpleInvokeRequest',
        'scpSimpleQueryResponse' => 'scpService_scpSimpleQueryResponse',
        'scpSpecialUrl' => 'scpService_scpSpecialUrl',
        'scpVersionRequest' => 'scpService_scpVersionRequest',
        'scpVersionResponse' => 'scpService_scpVersionResponse',
        'securityAttempted' => 'scpService_securityAttempted',
        'securityResult' => 'scpService_securityResult',
        'signature' => 'scpService_signature',
        'simpleItem' => 'scpService_simpleItem',
        'simpleItemSummary' => 'scpService_simpleItemSummary',
        'simplePayment' => 'scpService_simplePayment',
        'simplePaymentResult' => 'scpService_simplePaymentResult',
        'simpleSale' => 'scpService_simpleSale',
        'simpleSaleSummary' => 'scpService_simpleSaleSummary',
        'stageIndicator' => 'scpService_stageIndicator',
        'status' => 'scpService_status',
        'storeCardResult' => 'scpService_storeCardResult',
        'storedCardDetails' => 'scpService_storedCardDetails',
        'storedCardKey' => 'scpService_storedCardKey',
        'subject' => 'scpService_subject',
        'subjectType' => 'scpService_subjectType',
        'summaryData' => 'scpService_summaryData',
        'surchargeBasis' => 'scpService_surchargeBasis',
        'surchargeDetails' => 'scpService_surchargeDetails',
        'surchargeInfo' => 'scpService_surchargeInfo',
        'surchargeItemDetails' => 'scpService_surchargeItemDetails',
        'surchargeType' => 'scpService_surchargeType',
        'surchargeable' => 'scpService_surchargeable',
        'systemCode' => 'scpService_systemCode',
        'systemCodeDirect' => 'scpService_systemCodeDirect',
        'taxItem' => 'scpService_taxItem',
        'taxSurcharge' => 'scpService_taxSurcharge',
        'threePartName' => 'scpService_threePartName',
        'transactionState' => 'scpService_transactionState',
        'vatBase' => 'scpService_vatBase',
        'vatItem' => 'scpService_vatItem',
        'vatSurcharge' => 'scpService_vatSurcharge',
        'walletRequest' => 'scpService_walletRequest',
    ];

    /**
     * Service Constructor
     *
     * @param string $wsdl The location of the WSDL file.
     * @param array $options Any additional parameters to add to the service.
     */
    public function __construct(string $wsdl = null, array $options = [])
    {
        // Use the optional WSDL file location if it is supplied.
        $wsdl = is_null($wsdl) ? 'https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl' : $wsdl;

        // Add the classmap to the options.
        foreach (self::$classMap as $serviceClassName => $mappedClassName) {
            if (!isset($options['classmap'][$serviceClassName])) {
                $options['classmap'][$serviceClassName] = $mappedClassName;
            }
        }

        parent::__construct($wsdl, $options);
    }

    /**
     * Service call proxy.
     *
     * @param string $serviceName The name of the service being called.
     * @param array $parameters The parameters being supplied to the service.
     * @param SOAPHeader[] $requestHeaders An array of SOAPHeaders.
     *
     * @return mixed The service response.
     */
    protected function callProxy(string $serviceName, array $parameters = null, array $requestHeaders = null)
    {
        $result = $this->__soapCall(
            $serviceName,
            $parameters,
            [
                'uri' => 'http://tempuri.org/',
                'soapaction' => '',
            ],
            !empty($requestHeaders) ? array_filter($requestHeaders) : null,
            $responseHeaders
        );

        if (!empty($responseHeaders)) {
            foreach ($responseHeaders as $headerName => $headerData) {
                $this->$headerName = $headerData;
            }
        }

        return $result;
    }

    /**
     * Build and populate a SOAP header.
     *
     * @param string $headerName The name of the services SOAP Header.
     * @param array|object $rawHeaderData Any data that can be mapped to the SOAP Header. Public properties of objects will be used if an object is supplied.
     * @param string $namespace The namespace which will default to this service's namespace.
     *
     * @throws ReflectionException
     */
    public function assignSoapHeader(string $headerName, $rawHeaderData = null, string $namespace = self::SERVICE_NAMESPACE)
    {
        // Is there a corresponding property of this service for the requested SOAP Header?
        // Is there a mapped class for this SOAP Header?
        // Do we have any data to populate the SOAP Header with?
        if (property_exists($this, $headerName) && isset(self::$classMap[$headerName]) && !empty($rawHeaderData)) {
            // Start with no data for the SOAP Header.
            $dataForSoapHeader = [];
            $mappedData = [];

            // Get the mapped class and get the properties defined for the SOAP Header.
            $reflectedHeader = new ReflectionClass(self::$classMap[$headerName]);
            $reflectedHeaderProperties = $reflectedHeader->getProperties();

            // Produce an array of public data from an object.
            if (is_object($rawHeaderData)) {
                $reflectedData = new ReflectionClass($rawHeaderData);
                $reflectedDataProperties = $reflectedData->getProperties(ReflectionProperty::IS_PUBLIC);
                $mappedData = [];
                foreach ($reflectedDataProperties as $property) {
                    $propertyName = $property->name;
                    $mappedData[$propertyName] = $rawHeaderData->$propertyName;
                }
            } elseif (is_array($rawHeaderData)) {
                $mappedData = $rawHeaderData;
            }

            // Process the data as an array.
            if (!empty($mappedData)) {
                foreach ($reflectedHeaderProperties as $property) {
                    $propertyName = $property->name;
                    if (isset($mappedData[$propertyName])) {
                        $dataForSoapHeader[$propertyName] = $mappedData[$propertyName];
                    }
                }
            }

            // Build the SOAP Header and assign it the corresponding property.
            $this->$headerName = new SoapHeader($namespace, $headerName, $dataForSoapHeader);
        }
    }

    /**
     * @param scpService_scpSimpleInvokeRequest $scpSimpleInvokeRequest
     *
     * @return scpService_scpInvokeResponse
     */
    public function scpSimpleInvoke(scpService_scpSimpleInvokeRequest $scpSimpleInvokeRequest)
    {
        return $this->callProxy('scpSimpleInvoke', [$scpSimpleInvokeRequest]);
    }

    /**
     * @param scpService_scpQueryRequest $scpSimpleQueryRequest
     *
     * @return scpService_scpSimpleQueryResponse
     */
    public function scpSimpleQuery(scpService_scpQueryRequest $scpSimpleQueryRequest)
    {
        return $this->callProxy('scpSimpleQuery', [$scpSimpleQueryRequest]);
    }

    /**
     * @param scpService_scpVersionRequest $scpVersionRequest
     *
     * @return scpService_scpVersionResponse
     */
    public function scpVersion(scpService_scpVersionRequest $scpVersionRequest)
    {
        return $this->callProxy('scpVersion', [$scpVersionRequest]);
    }
}
