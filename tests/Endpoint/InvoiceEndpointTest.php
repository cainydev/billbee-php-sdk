<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\InvoiceEndpoint;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response\GetInvoicesResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class InvoiceEndpointTest extends TestCase
{
    private InvoiceEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new InvoiceEndpoint($this->client);
    }

    /**
     * @throws QuotaExceededException
     * @throws ConnectionException
     */
    public function testGetInvoices(): void
    {
        $this->endpoint->getInvoices();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/invoices', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
        ], $data);
        $this->assertSame(GetInvoicesResponse::class, $class);
    }

    /**
     * @throws ConnectionException
     * @throws QuotaExceededException
     */
    public function testGetInvoicesAdvanced(): void
    {
        $this->endpoint->getInvoices(
            page: 12,
            pageSize: 24,
            minInvoiceDate: new DateTime('2020-01-01T00:00:00'),
            maxInvoiceDate: new DateTime('2020-12-31T00:00:00'),
            shopId: [1, 233, 1],
            orderStateId: [1, 2, 3, 4, 4],
            tag: ['test', 'test', 'test1'],
            minPayDate: new DateTime('2020-01-01T01:00:00'),
            maxPayDate: new DateTime('2020-12-31T01:00:00'),
            includePositions: true,
        );
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/invoices', $node);
        $this->assertEquals([
            'page' => 12,
            'pageSize' => 24,
            'minInvoiceDate' => '2020-01-01T00:00:00+00:00',
            'maxInvoiceDate' => '2020-12-31T00:00:00+00:00',
            'shopId' => [1, 233],
            'orderStateId' => [1, 2, 3, 4],
            'tag' => ['test', 'test1'],
            'minPayDate' => '2020-01-01T01:00:00+00:00',
            'maxPayDate' => '2020-12-31T01:00:00+00:00',
            'includePositions' => 'true',
        ], $data);
        $this->assertSame(GetInvoicesResponse::class, $class);
    }
}
