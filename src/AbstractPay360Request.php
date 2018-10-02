<?php

namespace DigiTickets\Pay360;

use Omnipay\Common\Message\AbstractRequest;

abstract class AbstractPay360Request extends AbstractRequest
{
    const SERVICE_ENDPOINT_TEST = 'https://sbsctest.e-paycapita.com/scp/scpws/scpSimpleClient.wsdl';
    const SERVICE_ENDPOINT_LIVE = 'https://sbs.e-paycapita.com/scp/flow/start_flow?execution=e1s1&cpid=rt5d0cohghzx4uorws36y8979zpmy92&uiid=DFLT:669:373037774:ECOM:en:';

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
        return self::SERVICE_ENDPOINT_TEST;  // @TODO: This will depend on whether the account is live or not.
    }

    protected function getCredentials()
    {
        $this->requestIdentification = new \scpService_requestIdentification();
        $this->requestIdentification->uniqueReference = 'DT'.date('U');
        $this->requestIdentification->timeStamp = date('YmdHis'); // Format: YYYYMMDDHHMMSS

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
}