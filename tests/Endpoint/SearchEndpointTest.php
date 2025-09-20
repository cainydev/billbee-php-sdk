<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\SearchEndpoint;
use BillbeeDe\BillbeeAPI\Response\SearchDataResponse;
use BillbeeDe\BillbeeAPI\Type\SearchMode;
use BillbeeDe\BillbeeAPI\Type\SearchType;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class SearchEndpointTest extends TestCase
{
    private SearchEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new SearchEndpoint($this->client);
    }

    public function testSearch(): void
    {
        $term = 'Hello World';
        $type = [SearchType::ORDER];
        $searchMode = SearchMode::_SUGGEST;

        $this->endpoint->search($term, $type, $searchMode);

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $query, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('search', $node);
        $this->assertSame([
            'Type' => $type,
            'Term' => $term,
            'SearchMode' => $searchMode,
        ], $query);
        $this->assertSame(SearchDataResponse::class, $class);
    }
}
