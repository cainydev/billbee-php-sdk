<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response\GetCloudStoragesResponse;

readonly class CloudStorageEndpoint
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function getCloudStorages(): GetCloudStoragesResponse
    {
        return $this->client->get('cloudstorages', GetCloudStoragesResponse::class);
    }
}
