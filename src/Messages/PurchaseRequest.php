<?php

namespace DigiTickets\Pay360\Messages;

use Omnipay\Common\Message\AbstractRequest;

class PurchaseRequest extends AbstractRequest
{
    const SERVICE_ENDPOINT_TEST = 'https://sbsctest.e-paycapita.com/scp/flow/start_flow?execution=e1s1&cpid=i02hh5etcr0en1ddmcbvs667ziru08l&uiid=DFLT:669:373037774:ECOM:en:';
    const SERVICE_ENDPOINT_LIVE = 'https://sbs.e-paycapita.com/scp/flow/start_flow?execution=e1s1&cpid=rt5d0cohghzx4uorws36y8979zpmy92&uiid=DFLT:669:373037774:ECOM:en:';

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

    public function getSecretKey()
    {
        return 'OXIaZcZSG4kp5h3/sJeIHFdXooCsS7eRFiEbM/vpmDRQ0r8HVme7gKLH5yZqC6cJ5lCFZrEBBqMQTQdngALtJg=='; // @TODO: Temporary; needs to come from config
//        return $this->getParameter('secretKey');
    }

    public function getScpId()
    {
        return '373037774'; // @TODO: Temporary; needs to come from config
//        return $this->getParameter('scpId');
    }

    protected function getEndpoint()
    {
        return self::SERVICE_ENDPOINT_TEST;  // @TODO: This will depend on whether the account is live or not.
    }

    protected function generateDigest(
        \scpService_subject $subject,
        \scpService_requestIdentification $requestIdentification,
        \scpService_signature $signature
    ){
error_log('generateDigest...');
        $digest = implode(
            '!',
            [
                $subject->subjectType,
                $subject->identifier,
                $requestIdentification->uniqueReference,
                $requestIdentification->timeStamp,
                $signature->algorithm,
                $signature->hmacKeyID,
            ]
        );
//error_log('Digest stage one: '.$digest);
        $digest = utf8_encode($digest);
//error_log('Digest stage two: '.$digest);
        $key = base64_decode($this->getSecretKey());
        $hash = hash_hmac('sha256', $digest, $key, true);
        $digest = base64_encode($hash);
error_log('Digest stage three: '.$digest);

        return $digest;
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
        $routing->scpId = $this->getScpId();
error_log('After $routing');

        $saleSummary = new \scpService_summaryData();
        $saleSummary->description = 'Online Sale'; // Gets overwritten by items, apparently.
        $saleSummary->amountInMinorUnits = 100 * $this->getAmount();
        $saleSummary->reference = 'Reference'; // Gets overwritten by items, apparently.
        $saleSummary->displayableReference = 'Displayable Reference'; // Gets overwritten by items, apparently.
error_log('After $saleSummary');

        $items = [];
        /** @var \Omnipay\Common\Item $itemBagItem */
        foreach ($this->getItems() as $itemBagItem) {
            $itemSummary = new \scpService_summaryData();
            $itemSummary->description = $itemBagItem->getDescription();
            $itemSummary->amountInMinorUnits = 100*$itemBagItem->getPrice();

            $item = new \scpService_simpleItem();
            $item->itemSummary = $itemSummary;
            $item->quantity = $itemBagItem->getQuantity();

            $items[] = $item;
        }
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
        // post to Capita
        $processMessage = new \SOAPClient($this->getEndpoint());
error_log('ONE');
error_log('Functions: '.var_export($processMessage->__getFunctions(), true));
        $response = $processMessage->__soapCall('scpSimpleInvoke', ['scpSimpleInvokeRequest' => $data]);
error_log('TWO');
error_log('$response: '.var_export($response, true));

        return $this->response = new PurchaseResponse($this, $response);
    }
}