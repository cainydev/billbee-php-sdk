<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\WebHooksEndpoint;
use BillbeeDe\BillbeeAPI\Model\WebHook;
use BillbeeDe\BillbeeAPI\Model\WebHookFilter;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class WebHooksEndpointTest extends TestCase
{
    private WebHooksEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new WebHooksEndpoint($this->client);
    }

    public function testGetWebHooks()
    {
        $this->endpoint->getWebHooks();

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('webhooks', $node);
        $this->assertSame([], $query);
        $this->assertSame(sprintf('array<%s>', WebHook::class), $class);
    }

    public function testGetWebHook()
    {
        $this->endpoint->getWebHook('abasd');

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('webhooks/abasd', $node);
        $this->assertSame([], $query);
        $this->assertSame(WebHook::class, $class);
    }

    public function testGetWebHookFilters()
    {
        $this->endpoint->getWebHookFilters();

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('webhooks/filters', $node);
        $this->assertSame([], $query);
        $this->assertSame(sprintf('array<%s>', WebHookFilter::class), $class);
    }

    public function testCreateWebHook()
    {
        $webHook = new WebHook();
        $this->endpoint->createWebHook($webHook);

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('webhooks', $node);
        $this->assertSame(WebHook::class, $class);
    }

    public function testUpdateWebHookFailsMissingId()
    {
        $webHook = new WebHook();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The id of the webHook cannot be empty');
        $this->endpoint->updateWebHook($webHook);
    }

    public function testUpdateWebHook()
    {
        $webHook = new WebHook();
        $webHook->id = 'HelloWorld';

        $this->endpoint->updateWebHook($webHook);

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('PUT', $method);
        $this->assertSame('webhooks/HelloWorld', $node);
        $this->assertSame(WebHook::class, $class);
    }

    public function testDeleteAllWebHooks()
    {
        $this->endpoint->deleteAllWebHooks();

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('DELETE', $method);
        $this->assertSame('webhooks', $node);
        $this->assertSame([], $query);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }

    public function testDeleteWebHookById()
    {
        $this->endpoint->deleteWebHookById('HelloWorld');

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('DELETE', $method);
        $this->assertSame('webhooks/HelloWorld', $node);
        $this->assertSame([], $query);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }

    public function testDeleteWebHookFailsMissingId()
    {
        $webHook = new WebHook();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The id of the webHook cannot be empty');
        $this->endpoint->deleteWebHook($webHook);
    }

    public function testDeleteWebHook()
    {
        $webHook = new WebHook();
        $webHook->id = 'HelloWorld';
        $this->endpoint->deleteWebHook($webHook);

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('DELETE', $method);
        $this->assertSame('webhooks/HelloWorld', $node);
        $this->assertSame([], $query);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }
}
