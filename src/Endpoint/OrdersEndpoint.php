<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Model\MessageForCustomer;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrderResponse;
use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\BillbeeAPI\Response\CreateInvoiceResponse;
use BillbeeDe\BillbeeAPI\Response\CreateDeliveryNoteResponse;
use BillbeeDe\BillbeeAPI\Type\ArticleSource;
use BillbeeDe\BillbeeAPI\Type\SendMode;
use DateTimeInterface;
use InvalidArgumentException;

readonly class OrdersEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    /**
     * @param array<int> $shopId
     * @param array<int> $orderStateId
     * @param array<string> $tag
     * @throws QuotaExceededException|ConnectionException
     */
    public function getOrders(
        int $page = 1,
        int $pageSize = 50,
        ?DateTimeInterface $minOrderDate = null,
        ?DateTimeInterface $maxOrderDate = null,
        array $shopId = [],
        array $orderStateId = [],
        array $tag = [],
        ?int $minimumOrderId = null,
        ?DateTimeInterface $modifiedAtMin = null,
        ?DateTimeInterface $modifiedAtMax = null,
        ArticleSource $articleTitleSource = ArticleSource::ORDER_POSITION,
        bool $excludeTags = false,
    ): GetOrdersResponse {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
            'articleTitleSource' => $articleTitleSource,
        ];
        if ($minOrderDate) {
            $query['minOrderDate'] = $minOrderDate->format('c');
        }
        if ($maxOrderDate) {
            $query['maxOrderDate'] = $maxOrderDate->format('c');
        }
        if ($shopId) {
            $query['shopId'] = array_values(array_unique($shopId));
        }
        if ($orderStateId) {
            $query['orderStateId'] = array_values(array_unique($orderStateId));
        }
        if ($tag) {
            $query['tag'] = array_values(array_unique($tag));
        }
        if ($minimumOrderId) {
            $query['minimumBillBeeOrderId'] = $minimumOrderId;
        }
        if ($modifiedAtMin) {
            $query['modifiedAtMin'] = $modifiedAtMin->format('c');
        }
        if ($modifiedAtMax) {
            $query['modifiedAtMax'] = $modifiedAtMax->format('c');
        }
        if ($excludeTags) {
            $query['excludeTags'] = 'true';
        }

        return $this->client->get('orders', $query, GetOrdersResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function getPatchableFields(): GetPatchableFieldsResponse
    {
        return $this->client->get('orders/PatchableFields', [], GetPatchableFieldsResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function getOrder(int $id): GetOrderResponse
    {
        return $this->client->get("orders/$id", [], GetOrderResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function getOrderByOrderNumber(string $extRef): GetOrderResponse
    {
        $ref = urlencode($extRef);
        return $this->client->get("orders/findbyextref/$ref", [], GetOrderResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function createOrder(Order $order, int $shopId): ?GetOrderResponse
    {
        $payload = $this->client->getSerializer()->serialize($order, 'json');
        return $this->client->post("orders?shopId=$shopId", $payload, GetOrderResponse::class);
    }

    /**
     * @param array<string> $tags
     * @throws QuotaExceededException|ConnectionException
     */
    public function addOrderTags(int $orderId, array $tags = []): ?AcknowledgeResponse
    {
        return $this->client->post("orders/$orderId/tags", json_encode(['Tags' => $tags]), AcknowledgeResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function addOrderShipment(int $orderId, Shipment $shipment): bool
    {
        $payload = $this->client->getSerializer()->serialize($shipment, 'json');
        $res = $this->client->post("orders/$orderId/shipment", $payload, AcknowledgeResponse::class);
        return $res->errorCode === 0;
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function createDeliveryNote(int $orderId, bool $includePdf = false): CreateDeliveryNoteResponse
    {
        $uri = "orders/CreateDeliveryNote/$orderId?includePdf=" . ($includePdf ? 'True' : 'False');
        return $this->client->post($uri, [], CreateDeliveryNoteResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function createInvoice(
        int $orderId,
        bool $includePdf = false,
        ?int $templateId = null,
        ?int $sendToCloudId = null,
    ): CreateInvoiceResponse {
        $uri = "orders/CreateInvoice/$orderId?includeInvoicePdf=" . ($includePdf ? 'True' : 'False');
        if ($templateId) {
            $uri .= "&templateId=$templateId";
        }
        if ($sendToCloudId) {
            $uri .= "&sendToCloudId=$sendToCloudId";
        }
        return $this->client->post($uri, [], CreateInvoiceResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function sendMessage(int $orderId, MessageForCustomer $message): bool
    {
        if (count($message->subject) === 0) {
            throw new InvalidArgumentException("You have to specify a message subject");
        }
        if (count($message->body) === 0) {
            throw new InvalidArgumentException("You have to specify a message body");
        }
        if ($message->sendMode === SendMode::EXTERNAL_EMAIL && empty($message->alternativeEmailAddress)) {
            throw new InvalidArgumentException("With sendMode == 4 you must specify an alternativeEmailAddress");
        }
        if ($message->sendMode !== SendMode::EXTERNAL_EMAIL
            && !empty($message->alternativeEmailAddress)
        ) {
            $this->client->getLogger()->warning("The alternative email address is ignored because sendMode != " . SendMode::EXTERNAL_EMAIL->name);
        }

        $payload = $this->client->getSerializer()->serialize($message, 'json');
        $res = $this->client->post("orders/$orderId/send-message", $payload, AcknowledgeResponse::class);
        return $res->errorCode === 0;
    }

    /**
     * @param array<string> $tags
     * @throws QuotaExceededException|ConnectionException
     */
    public function setOrderTags(int $orderId, array $tags = []): AcknowledgeResponse
    {
        return $this->client->put("orders/$orderId/tags", json_encode(['Tags' => $tags]), AcknowledgeResponse::class);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function setOrderState(int $orderId, int $newState): bool
    {
        $res = $this->client->put(
            "orders/$orderId/orderstate",
            json_encode(['NewStateId' => $newState]),
            AcknowledgeResponse::class,
        );
        return $res->errorCode === 0;
    }

    /**
     * @param array<string, mixed> $fields
     * @throws QuotaExceededException|ConnectionException
     */
    public function patchOrder(int $orderId, array $fields): ?GetOrderResponse
    {
        return $this->client->patch("orders/$orderId", $fields, GetOrderResponse::class);
    }
}
