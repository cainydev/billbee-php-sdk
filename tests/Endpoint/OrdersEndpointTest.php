<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\OrdersEndpoint;
use BillbeeDe\BillbeeAPI\Model\MessageForCustomer;
use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\BillbeeAPI\Response\CreateDeliveryNoteResponse;
use BillbeeDe\BillbeeAPI\Response\CreateInvoiceResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrderByPartnerResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrderResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;
use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\BillbeeAPI\Type\ArticleSource;
use BillbeeDe\BillbeeAPI\Type\SendMode;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class OrdersEndpointTest extends TestCase
{
    private OrdersEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new OrdersEndpoint($this->client);
    }

    public function testGetOrders()
    {
        $this->endpoint->getOrders();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
            'articleTitleSource' => ArticleSource::ORDER_POSITION,
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);
    }

    public function testGetOrdersAdvanced()
    {
        $this->endpoint->getOrders(
            3,
            11,
            new DateTime('2020-01-01T00:00:00'),
            new DateTime('2020-12-31T00:00:00'),
            [11, 3, 4, 22, 3, 4],
            [1, 2, 3, 4, 4, 5],
            ['test', 'test2', 'test'],
            1,
            new DateTime('2020-01-01T01:00:00'),
            new DateTime('2020-12-31T01:00:00'),
            ArticleSource::ARTICLE_TITLE,
            true
        );
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders', $node);
        $this->assertSame([
            'page' => 3,
            'pageSize' => 11,
            'articleTitleSource' => ArticleSource::ARTICLE_TITLE,
            'minOrderDate' => '2020-01-01T00:00:00+00:00',
            'maxOrderDate' => '2020-12-31T00:00:00+00:00',
            'shopId' => [11, 3, 4, 22],
            'orderStateId' => [1, 2, 3, 4, 5],
            'tag' => ['test', 'test2'],
            'minimumBillBeeOrderId' => 1,
            'modifiedAtMin' => '2020-01-01T01:00:00+00:00',
            'modifiedAtMax' => '2020-12-31T01:00:00+00:00',
            'excludeTags' => 'true',
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);
    }

    public function testGetPatchableFields()
    {
        $this->endpoint->getPatchableFields();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/PatchableFields', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetPatchableFieldsResponse::class, $class);
    }

    public function testGetOrder()
    {
        $this->endpoint->getOrder(3421);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/3421', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetOrderResponse::class, $class);
    }

    public function testGetOrderByOrderNumber()
    {
        $this->endpoint->getOrderByOrderNumber('foo221');
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/findbyextref/foo221', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetOrderResponse::class, $class);
    }

    public function testGetOrderByPartner()
    {
        $this->endpoint->getOrderByPartner('foo221', 'demo');
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/find/foo221/demo', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetOrderByPartnerResponse::class, $class);
    }

    public function testCreateOrder()
    {
        $order = new Order();
        $this->endpoint->createOrder($order, 521);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders?shopId=521', $node);
        $this->assertSame(GetOrderResponse::class, $class);
    }

    public function testAddOrderTags()
    {
        $this->endpoint->addOrderTags(521, ['test', 'test2']);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders/521/tags', $node);
        $this->assertSame('{"Tags":["test","test2"]}', $data);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }

    public function testAddOrderShipment()
    {
        $shipment = new Shipment();
        $result = $this->endpoint->addOrderShipment(521, $shipment);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders/521/shipment', $node);
        $this->assertSame(AcknowledgeResponse::class, $class);
        $this->assertTrue($result);
    }

    public function testCreateDeliveryNote()
    {
        $this->endpoint->createDeliveryNote(521);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders/CreateDeliveryNote/521?includePdf=False', $node);
        $this->assertSame([], $data);
        $this->assertSame(CreateDeliveryNoteResponse::class, $class);
    }

    public function testCreateDeliveryNoteWithIncludePdf()
    {
        $this->endpoint->createDeliveryNote(521, true);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders/CreateDeliveryNote/521?includePdf=True', $node);
        $this->assertSame([], $data);
        $this->assertSame(CreateDeliveryNoteResponse::class, $class);
    }

    public function testCreateInvoice()
    {
        $this->endpoint->createInvoice(521);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders/CreateInvoice/521?includeInvoicePdf=False', $node);
        $this->assertSame([], $data);
        $this->assertSame(CreateInvoiceResponse::class, $class);
    }

    public function testCreateInvoiceAdvanced()
    {
        $this->endpoint->createInvoice(521, true, 234, 543);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders/CreateInvoice/521?includeInvoicePdf=True&templateId=234&sendToCloudId=543', $node);
        $this->assertSame([], $data);
        $this->assertSame(CreateInvoiceResponse::class, $class);
    }

    public function testSendMessageFailsNoSubject()
    {
        $message = new MessageForCustomer(
            sendMode: SendMode::EMAIL,
            subject: [],
            body: [new TranslatableText('de', 'test2')],
            alternativeEmailAddress: 'foo@bar.tld'
        );

        $this->expectException(InvalidArgumentException::class);

        $this->endpoint->sendMessage(521, $message);
    }

    public function testSendMessageFailsNoBody()
    {
        $message = new MessageForCustomer(
            sendMode: SendMode::EMAIL,
            subject: [new TranslatableText('de', 'test')],
            body: [],
            alternativeEmailAddress: 'foo@bar.tld'
        );

        $this->expectException(InvalidArgumentException::class);

        $this->endpoint->sendMessage(521, $message);
    }

    public function testSendMessage()
    {
        $message = new MessageForCustomer(
            sendMode: SendMode::EXTERNAL_EMAIL,
            subject: [new TranslatableText('de', 'test')],
            body: [new TranslatableText('de', 'test2')],
            alternativeEmailAddress: 'foo@bar.tld'
        );

        $this->endpoint->sendMessage(521, $message);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('orders/521/send-message', $node);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }

    public function testSetOrderTags()
    {
        $this->endpoint->setOrderTags(521, ['test', 'test2']);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('PUT', $method);
        $this->assertSame('orders/521/tags', $node);
        $this->assertSame('{"Tags":["test","test2"]}', $data);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }

    public function testSetOrderState()
    {
        $this->endpoint->setOrderState(521, 23);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('PUT', $method);
        $this->assertSame('orders/521/orderstate', $node);
        $this->assertSame('{"NewStateId":23}', $data);
        $this->assertSame(AcknowledgeResponse::class, $class);
    }

    public function testPatchOrder()
    {
        $model = ['hello' => 'world'];
        $this->endpoint->patchOrder(521, $model);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('PATCH', $method);
        $this->assertSame('orders/521', $node);
        $this->assertSame($model, $data);
        $this->assertSame(GetOrderResponse::class, $class);
    }
}
