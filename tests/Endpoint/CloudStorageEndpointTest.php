<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\CloudStorageEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetCloudStoragesResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class CloudStorageEndpointTest extends TestCase
{
    private CloudStorageEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new CloudStorageEndpoint($this->client);
    }

    public function testGetCloudStorages()
    {
        $this->endpoint->getCloudStorages();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('cloudstorages', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCloudStoragesResponse::class, $class);
    }
}
