<?php

namespace DigiTickets\Pay360;

use DigiTickets\Pay360\Messages\CompletePurchaseRequest;
use DigiTickets\Pay360\Messages\PurchaseRequest;
use Omnipay\Common\AbstractGateway;

class SimpleInterfaceGateway extends AbstractGateway
{
    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     */
    public function getName()
    {
        return 'Pay360 (Simple Interface)';
    }
    
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(CompletePurchaseRequest::class, $parameters);
    }

    public function completeAuthorize()
    {
        throw new \Exception('Method not implemented', 500);
    }

    public function deleteCard(array $parameters = array())
    {
        throw new \Exception('Method not implemented', 500);
    }

    public function authorize()
    {
        throw new \Exception('Method not implemented', 500);
    }

    public function void()
    {
        throw new \Exception('Method not implemented', 500);
    }

    public function capture()
    {
        throw new \Exception('Method not implemented', 500);
    }

    public function createCard()
    {
        throw new \Exception('Method not implemented', 500);
    }

    public function updateCard()
    {
        throw new \Exception('Method not implemented', 500);
    }

    public function refund()
    {
        throw new \Exception('Method not implemented', 500);
    }
}
