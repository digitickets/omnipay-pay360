<?php

namespace DigiTickets\Pay360;

use DigiTickets\Pay360\Messages\CompletePurchaseRequest;
use DigiTickets\Pay360\Messages\PurchaseRequest;
use Omnipay\Common\AbstractGateway;

class SimpleInterfaceGateway extends AbstractGateway
{
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }
}
