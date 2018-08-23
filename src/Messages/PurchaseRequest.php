<?php

namespace DigiTickets\Pay360\Messages;

use Omnipay\Common\Message\AbstractRequest;

class PurchaseRequest extends AbstractRequest
{
    public function getReturnUrl()
    {
        return $this->getParameter('returnUrl');
    }
    public function setReturnUrl($value)
    {
        return $this->setParameter('returnUrl', $value);
    }
    
    public function getCancelUrl()
    {
        return $this->getParameter('cancelUrl');
    }
    public function setCancelUrl($value)
    {
        return $this->setParameter('cancelUrl', $value);
    }
    public function getBackUrl()
    {
        return $this->getCancelUrl();
    }
    
    public function getAmount()
    {
        return $this->getParameter('amount');
    }
    public function setAmount($value)
    {
        return $this->setParameter('amount', $value);
    }
    
    protected function generateDigest(
        \scpService_subject $subject,
        \scpService_requestIdentification $requestIdentification,
        \scpService_signature$signature
    ){
error_log('generateDigest...');
        return 'TBC';
    }
    
    public function getData()
    {
error_log('getData...');
        $unknown = 'n/k'; // @TODO: Temporary
        $optional = 'TBA'; // @TODO: Temporary
        $config = '11223344';

        $subject = new \scpService_subject();
        $subject->subjectType = \scpService_subjectType::CAPITA_PORTAL;
        $subject->identifier = $config;  // Same as $routing->siteId
        $subject->systemCode = \scpService_systemCode::SCP;
error_log('After $subject');

        $requestIdentification = new \scpService_requestIdentification();
        $requestIdentification->uniqueReference = $this->getTransactionId();
        $requestIdentification->timeStamp = date('YmdHis'); // Format: YYYYMMDDHHMMSS
error_log('After $requestIdentification');

        $signature = new \scpService_signature();
        $signature->algorithm = \scpService_algorithm::ORIGINAL;
        $signature->hmacKeyID = $config;
        $signature->digest = $this->generateDigest($subject, $requestIdentification, $signature);
error_log('After $signature');

        $credentials = new \scpService_credentials();
        $credentials->subject = $subject;
        $credentials->requestIdentification = $requestIdentification;
        $credentials->signature = $signature;
error_log('After $credentials');

        $routing = new \scpService_routing();
        $routing->returnUrl = $this->getReturnUrl();
        $routing->backUrl = $this->getBackUrl();
        $routing->siteId = $config;
        $routing->scpId = $config;
error_log('After $routing');

        $saleSummary = new \scpService_summaryData();
        $saleSummary->description = 'Online Sale'; // Gets overwritten by items, apparently.
        $saleSummary->amountInMinorUnits = 100 * $this->getAmount();
        $saleSummary->reference = 'Reference'; // Gets overwritten by items, apparently.
        $saleSummary->displayableReference = 'Displayable Reference'; // Gets overwritten by items, apparently.
error_log('After $saleSummary');

        $items = $unknown; // @TODO: Comes from the item bag thing.
error_log('After $items');

        $sale = new \scpService_simpleSale();
        $sale->saleSummary = $saleSummary;
        $sale->deliveryDetails = $optional;
        $sale->lgSaleDetails = $optional;
        $sale->postageAndPacking = $optional;
        $sale->surchargeable = $optional;
        $sale->items = $items;
error_log('After $sale');

        $data = new \scpService_scpSimpleInvokeRequest();
        $data->credentials = $credentials;
        $data->requestType = \scpService_requestType::PAY_ONLY;
        $data->requestId = $unknown; // Customer-supplied request id - TBC
        $data->routing = $routing;
        $data->sale = $sale;
error_log('After $data');

        return $data;
    }
    
    public function sendData($data)
    {
error_log('sendData...');
        return $this->response = new PurchaseResponse($this, $data);
    }
}