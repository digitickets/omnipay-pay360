<?php

namespace DigiTickets\Pay360;

use DigiTickets\Pay360\Messages\CompletePurchaseRequest;
use DigiTickets\Pay360\Messages\PurchaseRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;


/**
 * GoCardless Gateway
 *
 * @method RequestInterface authorize(array $options = array())         (Optional method)
 *         Authorize an amount on the customers card
 * @method RequestInterface completeAuthorize(array $options = array()) (Optional method)
 *         Handle return from off-site gateways after authorization
 * @method RequestInterface capture(array $options = array())           (Optional method)
 *         Capture an amount you have previously authorized
 * @method RequestInterface void(array $options = array())              (Optional method)
 *         Generally can only be called up to 24 hours after submitting a transaction
 * @method RequestInterface createCard(array $options = array())        (Optional method)
 *         The returned response object includes a cardReference, which can be used for future transactions
 * @method RequestInterface updateCard(array $options = array())        (Optional method)
 *         Update a stored card
 * @method RequestInterface deleteCard(array $options = array())        (Optional method)
 *         Delete a stored card
 * @method RequestInterface refund(array $options = array())           (Optional method)
 *         Process a refund
 */

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
}
