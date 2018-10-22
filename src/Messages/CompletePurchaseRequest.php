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
        foreach ($this->getGateway()->getListeners() as $listener) {
            $listener->update('completeSend', $t);
        }

        try {
            $scpClient = $this->getScpService();
        } catch (\Throwable $t) {
            foreach ($this->getGateway()->getListeners() as $listener) {
                $listener->update('clientException', $t);
            }
            error_log($t->getMessage().' '.$t->getTraceAsString());
            return $this->response = new CompletePurchaseResponse($this, $t);
        }
        try {
            $scpSimpleQueryResponse = $scpClient->scpSimpleQuery($data);
        } catch (\Throwable $t) {
            foreach ($this->getGateway()->getListeners() as $listener) {
                $listener->update('completeException', $t);
            }
            error_log($t->getMessage().' '.$t->getTraceAsString());
            return $this->response = new CompletePurchaseResponse($this, $t);
        }

        foreach ($this->getGateway()->getListeners() as $listener) {
            $listener->update('completeReceive', $scpSimpleQueryResponse);
        }

        return $this->response = new CompletePurchaseResponse($this, $scpSimpleQueryResponse);
    }
}