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
    
    public function getData()
    {
        $unknown = 'n/k'; // @TODO: Temporary
        $optional = 'TBA'; // @TODO: Temporary
        
        $subject = new \scpService_subject();
        $subject->subjectType = \scpService_subjectType::CAPITA_PORTAL;
        $subject->identifier = $unknown;
        $subject->systemCode = \scpService_systemCode::SCP;
        
        $requestIdentification = new \scpService_requestIdentification();
        $requestIdentification->uniqueReference = $this->getTransactionId();
        $requestIdentification->timeStamp = date('YmdHis'); // Format: YYYYMMDDHHMMSS
        
        $signature = new \scpService_signature();
        $signature->algorithm = \scpService_algorithm::ORIGINAL;
        $signature->hmacKeyID = $unknown;
        $signature->digest = $unknown;
    
        $credentials = new \scpService_credentials();
        $credentials->subject = $subject;
        $credentials->requestIdentification = $requestIdentification;
        $credentials->signature = $signature;
    
        $routing = new \scpService_routing();
        $routing->returnUrl = $this->getReturnUrl();
        $routing->backUrl = $this->getBackUrl();
        $routing->siteId = $unknown;
        $routing->scpId = $unknown;
    
        $saleSummary = new \scpService_summaryData();
        $saleSummary->description = 'Online Sale'; // Gets overwritten by items, apparently.
        $saleSummary->amountInMinorUnits = 100 * $this->getAmount();
        $saleSummary->reference = 'Reference'; // Gets overwritten by items, apparently.
        $saleSummary->displayableReference = 'Displayable Reference'; // Gets overwritten by items, apparently.
    
        $items = $unknown; // @TODO: Comes from the item bag thing.
        
        $sale = new \scpService_simpleSale();
        $sale->saleSummary = $saleSummary;
        $sale->deliveryDetails = $optional;
        $sale->lgSaleDetails = $optional;
        $sale->postageAndPacking = $optional;
        $sale->surchargeable = $optional;
        $sale->items = $items;
    
        $data = new \scpService_scpSimpleInvokeRequest();
        $data->credentials = $credentials;
        $data->requestType = \scpService_requestType::PAY_ONLY;
        $data->requestId = $unknown;
        $data->routing = $routing;
        $data->sale = $sale;
        
        return $data;
    }
    
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}