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
    /** @var array<int, array{string, string, mixed, ?string}> */
    private array $requests;

    private ?SerializerInterface $serializer = null;

    public function __construct(
    ) {
    }

    /** @param array<string, mixed> $query */
    public function get(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        $this->requests[] = ['GET', $endpoint, $query, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    /** @param array<string, mixed> $query */
    public function getArray(string $endpoint, array $query = [], ?string $responseClass = null): array
    {
        $this->requests[] = ['GET', $endpoint, $query, sprintf('array<%s>', $responseClass)];
        return [];
    }

    public function post(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        $this->requests[] = ['POST', $endpoint, $data, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    public function put(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        $this->requests[] = ['PUT', $endpoint, $data, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    public function patch(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed
    {
        $this->requests[] = ['PATCH', $endpoint, $data, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    /** @param array<string, mixed> $query */
    public function delete(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        $this->requests[] = ['DELETE', $endpoint, $query, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    /** @return array<int, array{string, string, mixed, ?string}> */
    public function getRequests(): array
    {
        return $this->requests;
    }

    private function dummyResponse(?string $responseClass): mixed
    {
        if ($responseClass === null || $responseClass === AcknowledgeResponse::class) {
            return new AcknowledgeResponse();
        }

        if (class_exists($responseClass)) {
            return new $responseClass();
        }

        if (str_starts_with($responseClass, 'array')) {
            return [];
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
