<?php

namespace DigiTickets\Pay360\Messages;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\AbstractResponse;

class CompletePurchaseResponse extends AbstractResponse
{
    public function getTransactionId()
    {
        /** @var CompletePurchaseRequest|AbstractRequest $request */
        $request = $this->getRequest();
        return $request->getTransactionId();
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
