<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response\GetTermsInfoResponse;

readonly class ProvisioningEndpoint
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getTermsInfo(): GetTermsInfoResponse
    {
        return $this->client->get('automaticprovision/termsinfo', GetTermsInfoResponse::class);
    }
}