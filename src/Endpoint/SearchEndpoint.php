<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response\SearchDataResponse;
use BillbeeDe\BillbeeAPI\Type\SearchType;
use BillbeeDe\BillbeeAPI\Type\SearchMode;

readonly class SearchEndpoint
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function search(
        string $term,
        array $type = [SearchType::PRODUCT, SearchType::ORDER, SearchType::CUSTOMER],
        SearchMode $searchMode = SearchMode::_EXPERT,
    ): SearchDataResponse {
        return $this->client->post(
            'search',
            [
                'Type' => $type,
                'Term' => $term,
                'SearchMode' => $searchMode,
            ],
            SearchDataResponse::class,
        );
    }
}
