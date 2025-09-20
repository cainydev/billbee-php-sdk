<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\ProvisioningEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetTermsInfoResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class ProvisioningEndpointTest extends TestCase
{
    private ProvisioningEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new ProvisioningEndpoint($this->client);
    }

    public function testGetTermsInfo(): void
    {
        $this->endpoint->getTermsInfo();

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('automaticprovision/termsinfo', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetTermsInfoResponse::class, $class);
    }
}
