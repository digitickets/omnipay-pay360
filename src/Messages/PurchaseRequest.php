<?php

namespace DigiTickets\Pay360\Messages;

use DigiTickets\Pay360\AbstractPay360Request;

class PurchaseRequest extends AbstractPay360Request
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
        $routing = new \scpService_routing();
        $routing->returnUrl = $this->getReturnUrl();
        $routing->backUrl = $this->getBackUrl();
        $routing->siteId = $this->getRoutingSiteId();
        $routing->scpId = $this->getRoutingScpId();

        $saleSummary = new \scpService_summaryData();
        $saleSummary->description = 'Online Sale';
        $saleSummary->amountInMinorUnits = (int) (100 * $this->getAmount());

        $items = [];
        $lineId = 1;
        /** @var \Omnipay\Common\Item $itemBagItem */
        foreach ($this->getItems() as $itemBagItem) {
            $itemSummary = new \scpService_summaryData();
            $itemSummary->description = $itemBagItem->getName();
            $itemSummary->amountInMinorUnits = (int) (100*$itemBagItem->getPrice()) * $itemBagItem->getQuantity();

            $item = new \scpService_simpleItem();
            $item->itemSummary = $itemSummary;
            $item->quantity = $itemBagItem->getQuantity();
            $item->lineId = $lineId++;

            $items[] = $item;
        }

        $sale = new \scpService_simpleSale();
        $sale->saleSummary = $saleSummary;
        $sale->items = $items;

        $scpSimpleInvokeRequest = new \scpService_scpSimpleInvokeRequest();
        $scpSimpleInvokeRequest->credentials = $this->getCredentials();
        $scpSimpleInvokeRequest->requestType = 'payOnly';
        $scpSimpleInvokeRequest->requestId = $this->requestIdentification->uniqueReference;
        $scpSimpleInvokeRequest->routing = $routing;
        $scpSimpleInvokeRequest->panEntryMethod = 'ECOM';
        $scpSimpleInvokeRequest->sale = $sale;

        return $scpSimpleInvokeRequest;
    }

    public function sendData($data)
    {
        try {
            $scpClient = new \scpService(
                self::SERVICE_ENDPOINT_TEST,
                [
                    'encoding' => 'UTF-8',
                    'exception' => true,
                    'trace' => true,
                ]
            );
        } catch (\Throwable $t) {
            error_log($t->getMessage().' '.$t->getTraceAsString());
            return $this->response = new PurchaseResponse($this, $t);
        }

        try {
            $scpSimpleInvokeResponse = $scpClient->scpSimpleInvoke($data);
        } catch (\Throwable $t) {
            error_log($t->getMessage().' '.$t->getTraceAsString());
            return $this->response = new PurchaseResponse($this, $t);
        }

        return $this->response = new PurchaseResponse($this, $scpSimpleInvokeResponse);
    }
}