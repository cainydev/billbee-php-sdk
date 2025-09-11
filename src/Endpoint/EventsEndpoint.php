<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Response\GetEventsResponse;
use DateTimeInterface;

readonly class EventsEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function getEvents(
        int $page = 1,
        int $pageSize = 50,
        ?DateTimeInterface $minDate = null,
        ?DateTimeInterface $maxDate = null,
        array $typeIds = [],
        ?int $orderId = null,
    ): ?GetEventsResponse {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];
        if ($minDate) {
            $query['minDate'] = $minDate->format('c');
        }
        if ($maxDate) {
            $query['maxDate'] = $maxDate->format('c');
        }
        if ($typeIds) {
            $query['typeId'] = $typeIds;
        }
        if ($orderId) {
            $query['orderId'] = $orderId;
        }
        return $this->client->get('events', $query, GetEventsResponse::class);
    }
}
