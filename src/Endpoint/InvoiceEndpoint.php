<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
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

    /**
     * @param array<int> $shopId
     * @param array<int> $orderStateId
     * @param array<string> $tag
     * @throws QuotaExceededException|ConnectionException
     */
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

        if (!empty($shopId)) {
            $query['shopId'] = array_values(array_unique($shopId));
        }

        if (!empty($orderStateId)) {
            $query['orderStateId'] = array_values(array_unique($orderStateId));
        }

        if (!empty($tag)) {
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
