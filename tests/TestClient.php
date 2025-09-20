<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\BillbeeAPI\SerializerFactory;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class TestClient implements ClientInterface
{
    /** @var array<int, array{string, string, mixed, string}> */
    private array $requests = [];

    private ?SerializerInterface $serializer = null;

    public function __construct()
    {
    }

    /** @param array<string, mixed> $query */
    public function get(string $endpoint, string $responseClass, array $query = []): mixed
    {
        $this->requests[] = ['GET', $endpoint, $query, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    /** @param array<string, mixed> $query */
    public function getArray(string $endpoint, string $responseClass, array $query = []): array
    {
        // record the requested array element type as array<...>
        $this->requests[] = ['GET', $endpoint, $query, sprintf('array<%s>', $responseClass)];
        return [];
    }

    public function post(string $endpoint, string $responseClass, mixed $data = null): mixed
    {
        $this->requests[] = ['POST', $endpoint, $data, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    public function put(string $endpoint, string $responseClass, mixed $data = null): mixed
    {
        $this->requests[] = ['PUT', $endpoint, $data, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    public function patch(string $endpoint, string $responseClass, mixed $data = null): mixed
    {
        $this->requests[] = ['PATCH', $endpoint, $data, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    /** @param array<string, mixed> $query */
    public function delete(string $endpoint, string $responseClass, array $query = []): mixed
    {
        $this->requests[] = ['DELETE', $endpoint, $query, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    /** @return array<int, array{string, string, mixed, string}> */
    public function getRequests(): array
    {
        return $this->requests;
    }

    private function dummyResponse(string $responseClass): mixed
    {
        if ($responseClass === AcknowledgeResponse::class) {
            return new AcknowledgeResponse();
        }

        if (str_starts_with($responseClass, 'array')) {
            return [];
        }

        if (class_exists($responseClass)) {
            return new $responseClass();
        }

        return null;
    }

    public function getSerializer(): SerializerInterface
    {
        return $this->serializer ??= SerializerFactory::create();
    }

    public function getLogger(): LoggerInterface
    {
        return new NullLogger();
    }
}
