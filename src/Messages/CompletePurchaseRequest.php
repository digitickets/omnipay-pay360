<?php

namespace DigiTickets\Pay360\Messages;

use DigiTickets\Pay360\AbstractPay360Request;

class CompletePurchaseRequest extends AbstractPay360Request
{
    public function getData()
    {
        $scpQuery = new \scpService_scpQueryRequest();
        $scpQuery->credentials = $this->getCredentials();
        $scpQuery->siteId = $this->getRoutingSiteId();
        $scpQuery->scpReference = $this->getTransactionReference();

        return $scpQuery;
    }

    public function sendData($data)
    {
        $scpClient = new \scpService(
            self::SERVICE_ENDPOINT_TEST,
            [
                'encoding' => 'UTF-8',
                'exception' => true,
                'trace' => true,
            ]
        );

        try {
            $scpSimpleQueryResponse = $scpClient->scpSimpleQuery($data);
        } catch (\Throwable $t) {
            error_log($t->getMessage().' '.$t->getTraceAsString());
            return $this->response = new PurchaseResponse($this, $t);
        }

        return $this->response = new CompletePurchaseResponse($this, $scpSimpleQueryResponse);
    }
}