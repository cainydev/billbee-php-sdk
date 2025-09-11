<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Response\GetLayoutsResponse;

readonly class LayoutsEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function getLayouts(): GetLayoutsResponse
    {
        return $this->client->get('layouts', [], GetLayoutsResponse::class);
    }
}
