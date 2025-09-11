<?php

declare(strict_types=1);

namespace BillbeeDe\BillbeeAPI;

final class BatchClient
{
    private array $requests = [];
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Queue a request for batching.
     * @param string $method 'get', 'post', 'put', 'patch', 'delete'
     * @param string $endpoint
     * @param mixed $dataOrQuery
     * @param class-string|null $responseClass
     * @return BatchClient
     */
    public function queue(string $method, string $endpoint, mixed $dataOrQuery = null, ?string $responseClass = null): self
    {
        $this->requests[] = [
            'method' => $method,
            'endpoint' => $endpoint,
            'dataOrQuery' => $dataOrQuery,
            'responseClass' => $responseClass,
        ];
        return $this;
    }

    /**
     * Execute all queued batch requests, returning results in order.
     * Note: This is *not* a true HTTP batch. Requests are sent sequentially.
     */
    public function execute(): array
    {
        $results = [];
        foreach ($this->requests as $req) {
            $method = $req['method'];
            $endpoint = $req['endpoint'];
            $dataOrQuery = $req['dataOrQuery'];
            $responseClass = $req['responseClass'];

            switch ($method) {
                case 'get':
                case 'delete':
                    $results[] = $this->client->$method($endpoint, (array)$dataOrQuery, $responseClass);
                    break;
                case 'post':
                case 'put':
                case 'patch':
                    $results[] = $this->client->$method($endpoint, $dataOrQuery, $responseClass);
                    break;
                default:
                    throw new \InvalidArgumentException("Unknown method: $method");
            }
        }
        $this->requests = [];
        return $results;
    }

    /**
     * Clear all queued requests.
     */
    public function clear(): void
    {
        $this->requests = [];
    }
}
