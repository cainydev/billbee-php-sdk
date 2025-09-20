<?php

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use Exception;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

interface ClientInterface
{
    /**
     * @phpstan-template T
     * @phpstan-param class-string<T> $responseClass
     * @phpstan-return T
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function get(string $endpoint, string $responseClass, array $query = []): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T> $responseClass
     * @phpstan-return array<T>
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function getArray(string $endpoint, string $responseClass, array $query = []): array;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T> $responseClass
     * @phpstan-return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function post(string $endpoint, string $responseClass, mixed $data = null): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T> $responseClass
     * @phpstan-return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function put(string $endpoint, string $responseClass, mixed $data = null): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T> $responseClass
     * @phpstan-return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function patch(string $endpoint, string $responseClass, mixed $data = null): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T> $responseClass
     * @phpstan-return T
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function delete(string $endpoint, string $responseClass, array $query = []): mixed;

    public function getSerializer(): SerializerInterface;

    public function getLogger(): LoggerInterface;
}