<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\LayoutsEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetLayoutsResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class LayoutsEndpointTest extends TestCase
{
    private LayoutsEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new LayoutsEndpoint($this->client);
    }

    public function testGetLayouts(): void
    {
        $this->endpoint->getLayouts();

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('layouts', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetLayoutsResponse::class, $class);
    }
}
