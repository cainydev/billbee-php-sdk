<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\EventsEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetEventsResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use DateTime;
use PHPUnit\Framework\TestCase;

class EventsEndpointTest extends TestCase
{
    private EventsEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new EventsEndpoint($this->client);
    }

    public function testGetEvents()
    {
        $this->endpoint->getEvents();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('events', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
        ], $data);
        $this->assertSame(GetEventsResponse::class, $class);
    }

    public function testGetEventsAdvanced()
    {
        $this->endpoint->getEvents(
            10,
            35,
            new DateTime('2020-01-01T00:00:00'),
            new DateTime('2020-12-31T23:59:59'),
            [1, 2, 5],
            123
        );
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('events', $node);
        $this->assertSame([
            'page' => 10,
            'pageSize' => 35,
            'minDate' => '2020-01-01T00:00:00+00:00',
            'maxDate' => '2020-12-31T23:59:59+00:00',
            'typeId' => [1, 2, 5],
            'orderId' => 123,
        ], $data);
        $this->assertSame(GetEventsResponse::class, $class);
    }
}
