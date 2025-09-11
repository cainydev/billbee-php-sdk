<?php

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Configuration\ClientConfiguration;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

interface ClientInterface
{
    public function get(string $endpoint, array $query = [], ?string $responseClass = null): mixed;

    public function post(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed;

    public function put(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed;

    public function patch(string $endpoint, mixed $data = null, ?string $responseClass = null): mixed;

    public function delete(string $endpoint, array $query = [], ?string $responseClass = null): mixed;

    public function getSerializer(): SerializerInterface;

    public function getLogger(): LoggerInterface;
}
