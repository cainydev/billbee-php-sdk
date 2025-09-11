<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\BatchClient;
use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Configuration\ClientConfiguration;
use BillbeeDe\BillbeeAPI\Response\AcknowledgeResponse;
use BillbeeDe\BillbeeAPI\SerializerFactory;
use BillbeeDe\BillbeeAPI\Transformer\AsIsTransformer;
use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use BillbeeDe\BillbeeAPI\Transformer\NativeDateTimeHandler;
use Exception;
use JMS\Serializer\Handler\EnumHandler;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use function str_starts_with;

final class TestClient implements ClientInterface
{
    private array $requests;

    private ?SerializerInterface $serializer = null;

    public function __construct(
    ) {
    }

    public function get(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        $this->requests[] = ['GET', $endpoint, $query, $responseClass];
        return $this->dummyResponse($responseClass);
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

    public function delete(string $endpoint, array $query = [], ?string $responseClass = null): mixed
    {
        $this->requests[] = ['DELETE', $endpoint, $query, $responseClass];
        return $this->dummyResponse($responseClass);
    }

    /** @return array<array<string, mixed>> */
    public function getRequests(): array
    {
        return $this->requests;
    }

    public function clearRequests(): void
    {
        $this->requests = [];
    }

    private function dummyResponse(?string $responseClass): mixed
    {
        if ($responseClass === null || $responseClass === AcknowledgeResponse::class) {
            return new AcknowledgeResponse;
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
