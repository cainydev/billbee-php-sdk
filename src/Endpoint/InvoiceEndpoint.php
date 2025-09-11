<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Response\GetInvoicesResponse;
use DateTimeInterface;
use InvalidArgumentException;
use function array_unique;
use function array_values;

readonly class InvoiceEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function getInvoices(
        int $page = 1,
        int $pageSize = 50,
        ?DateTimeInterface $minInvoiceDate = null,
        ?DateTimeInterface $maxInvoiceDate = null,
        array $shopId = [],
        array $orderStateId = [],
        array $tag = [],
        ?DateTimeInterface $minPayDate = null,
        ?DateTimeInterface $maxPayDate = null,
        bool $includePositions = false,
    ): ?GetInvoicesResponse {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minInvoiceDate) {
            $query['minInvoiceDate'] = $minInvoiceDate->format('c');
        }
        if ($maxInvoiceDate) {
            $query['maxInvoiceDate'] = $maxInvoiceDate->format('c');
        }
        if ($shopId) {
            foreach ($shopId as $id) {
                if (!is_numeric($id)) {
                    throw new InvalidArgumentException('shopId must be an array of int');
                }
            }
            $query['shopId'] = array_values(array_unique($shopId));
        }
        if ($orderStateId) {
            foreach ($orderStateId as $id) {
                if (!is_numeric($id)) {
                    throw new InvalidArgumentException('orderStateId must be an array of int');
                }
            }

            $query['orderStateId'] = array_values(array_unique($orderStateId));
        }
        if ($tag) {
            $query['tag'] = array_values(array_unique($tag));
        }
        if ($minPayDate) {
            $query['minPayDate'] = $minPayDate->format('c');
        }
        if ($maxPayDate) {
            $query['maxPayDate'] = $maxPayDate->format('c');
        }
        if ($includePositions) {
            $query['includePositions'] = 'true';
        }
        return $this->client->get('orders/invoices', $query, GetInvoicesResponse::class);
    }
}
