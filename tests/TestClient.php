<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\ClientInterface;

class TestClient implements ClientInterface
{
    private $requests = [];
    private $handlers = [];

    public function get(string $node, array $query, string $responseClass): null
    {
        return $this->handle('GET', $node, $query, $responseClass);
    }

    private function handle($method, $node, $query, $responseClass)
    {
        $this->requests[] = [
            $method,
            $node,
            $query,
            $responseClass,
        ];

        return null;
    }

    public function post(string $node, mixed $data, string $responseClass): mixed
    {
        return $this->handle('POST', $node, $data, $responseClass);
    }

    public function put(string $node, mixed $data, string $responseClass): mixed
    {
        return $this->handle('PUT', $node, $data, $responseClass);
    }

    public function patch(string $node, mixed $data, string $responseClass): mixed
    {
        return $this->handle('PATCH', $node, $data, $responseClass);
    }

    public function delete(string $node, array $query, string $responseClass): mixed
    {
        return $this->handle('DELETE', $node, $query, $responseClass);
    }

    public function getRequests()
    {
        return $this->requests;
    }

    public function clearRequests()
    {
        $this->requests = [];
    }
}
