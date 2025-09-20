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
     * @phpstan-param class-string<T>|null $responseClass
     * @phpstan-return T
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function get(string $endpoint, array $query = [], ?string $responseClass = null): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T>|null $responseClass
     * @phpstan-return array<T>
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function getArray(string $endpoint, array $query = [], ?string $responseClass = null): array;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T>|null $responseClass
     * @phpstan-return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function post(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T>|null $responseClass
     * @phpstan-return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function put(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T>|null $responseClass
     * @phpstan-return T
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function patch(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed;

    /**
     * @phpstan-template T
     * @phpstan-param class-string<T>|null $responseClass
     * @phpstan-return T
     * @param array<string, mixed> $query
     * @throws QuotaExceededException|InvalidIdException|ConnectionException|Exception
     */
    public function delete(string $endpoint, array $query = [], ?string $responseClass = null): mixed;

    public function getSerializer(): SerializerInterface;

    public function getLogger(): LoggerInterface;
}
