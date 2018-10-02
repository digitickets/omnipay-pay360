<?php

namespace DigiTickets\Pay360\Messages;

use Omnipay\Common\Message\AbstractResponse;

class CompletePurchaseResponse extends AbstractResponse
{
    public function getTransactionId()
    {
        return $this->getRequest()->getTransactionId();
    }

    public function getTransactionReference()
    {
        return $this->getData()->scpReference;
    }

    public function getCode()
    {
        return $this->getData()->paymentResult->errorDetails->errorId;
    }

    public function getMessage()
    {
        return $this->getData()->paymentResult->errorDetails->errorMessage;
    }

    public function isSuccessful()
    {
        return $this->getData()->paymentResult->status == 'SUCCESS';
    }
}