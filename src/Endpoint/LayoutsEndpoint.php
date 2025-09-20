<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response\GetLayoutsResponse;

readonly class LayoutsEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    /**
     * @throws ConnectionException|QuotaExceededException
     */
    public function getLayouts(): GetLayoutsResponse
    {
        return $this->client->get('layouts', [], GetLayoutsResponse::class);
    }
}
