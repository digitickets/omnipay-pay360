<?php

namespace DigiTickets\Pay360;

use DateTime;
use DateTimeZone;
use Omnipay\Common\Message\AbstractRequest;

abstract class AbstractPay360Request extends AbstractRequest
{
    const SERVICE_ENDPOINT_TEST = 'https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl';
    const SERVICE_ENDPOINT_LIVE = 'https://sbs.e-paycapita.com/scp/scpws';

    /**
     * @var \scpService_requestIdentification
     */
    protected $requestIdentification;

    public function setSignatureHmacKeyID($signatureHmacKeyID)
    {
        $this->setParameter('signatureHmacKeyID', $signatureHmacKeyID);
    }

    public function getSignatureHmacKeyID()
    {
        return $this->getParameter('signatureHmacKeyID');
    }

    public function setRoutingSiteId($routingSiteId)
    {
        $this->setParameter('routingSiteId', $routingSiteId);
    }

    public function getRoutingSiteId()
    {
        return $this->getParameter('routingSiteId');
    }

    public function setSubjectId($subjectId)
    {
        $this->setParameter('subjectId', $subjectId);
    }

    public function getSubjectId()
    {
        return $this->getParameter('subjectId');
    }

    public function setRoutingScpId($routingScpId)
    {
        $this->setParameter('routingScpId', $routingScpId);
    }

    public function getRoutingScpId()
    {
        return $this->getParameter('routingScpId');
    }

    public function setCredentialsIdentifier($credentialsIdentifier)
    {
        $this->setParameter('credentialsIdentifier', $credentialsIdentifier);
    }

    public function getCredentialsIdentifier()
    {
        return $this->getParameter('credentialsIdentifier');
    }

    public function setSecretKey($secretKey)
    {
        $this->setParameter('secretKey', $secretKey);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    protected function getEndpoint()
    {
        $serviceEndpoint = self::SERVICE_ENDPOINT_LIVE;

        if ($this->getTestMode()) {
            $serviceEndpoint = self::SERVICE_ENDPOINT_TEST;
        }

        return $serviceEndpoint;
    }

    protected function getCredentials()
    {
        $this->requestIdentification = new \scpService_requestIdentification();
        $this->requestIdentification->uniqueReference = 'DT'.date('U');
        $this->requestIdentification->timeStamp = (new DateTime('now', new DateTimeZone('UTC')))->format('YmdHis'); // Format: YYYYMMDDHHMMSS

        $subject = new \scpService_subject();
        $subject->subjectType = \scpService_subjectType::CAPITA_PORTAL;
        $subject->identifier = $this->getSubjectId();
        $subject->systemCode = 'SCP';

        $signature = new \scpService_signature();
        $signature->algorithm = \scpService_algorithm::ORIGINAL;
        $signature->hmacKeyID = $this->getSignatureHmacKeyID();
        $signature->digest = $this->generateDigest($subject, $this->requestIdentification, $signature);

        $credentials = new \scpService_credentials();
        $credentials->subject = $subject;
        $credentials->identifier = $this->getCredentialsIdentifier();
        $credentials->requestIdentification = $this->requestIdentification;
        $credentials->signature = $signature;

        return $credentials;
    }

    protected function generateDigest(
        /*\scpService_subject*/ $subject,
        /*\scpService_requestIdentification*/ $requestIdentification,
        /*\scpService_signature*/ $signature
    ){
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

        $digest = utf8_encode($digest);
        $key = base64_decode($this->getSecretKey());
        $hash = hash_hmac('sha256', $digest, $key, true);
        $digest = base64_encode($hash);

        return $digest;
    }

    public function setScpService($scpService)
    {
        $this->setParameter('scpService', $scpService);
    }

    protected function getScpService()
    {
        /**
         * The location is nbeing set as the wsdl file is only supplied from the test endpoint. This is set up as the
         * default in the scpService class so can be supplied as null here
         */
        if ($this->getParameter('scpService') == null) {
            $scpClient = new \scpService(
                null,
                [
                    'encoding' => 'UTF-8',
                    'exception' => true,
                    'trace' => true,
                    'location' => $this->getEndpoint(),
                ]
            );
            return $scpClient;
        } else {
            return $this->getParameter('scpService');
        }
    }

    public function setGateway($value)
    {
        $this->setParameter('gateway', $value);
    }

    public function getGateway()
    {
        return $this->getParameter('gateway');
    }
}