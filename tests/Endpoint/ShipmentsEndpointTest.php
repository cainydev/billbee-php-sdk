<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\ShipmentsEndpoint;
use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabel;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\BillbeeAPI\Response\ShipWithLabelResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class ShipmentsEndpointTest extends TestCase
{
    private ShipmentsEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new ShipmentsEndpoint($this->client);
    }

    public function testGetShippingProviders(): void
    {
        $this->endpoint->getShippingProviders();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('shipment/shippingproviders', $node);
        $this->assertSame([], $query);
        $this->assertSame(sprintf('array<%s>', ShippingProvider::class), $class);
    }

    public function testShipWithLabel(): void
    {
        $shipment = new ShipmentWithLabel(42);
        $this->endpoint->shipWithLabel($shipment);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('shipment/shipwithlabel', $node);
        $this->assertSame(ShipWithLabelResponse::class, $class);
    }
}
