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

namespace BillbeeDe\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use Exception;

interface ClientInterface
{
    /**
     * Starts an GET request
     *
     * @param string $node The requested node
     * @param array<string, mixed> $query The parameters
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function get(string $node, array $query, string $responseClass): mixed;

    /**
     * Starts an POST request
     *
     * @param string $node The requested node
     * @param mixed $data The body
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function post(string $node, mixed $data, string $responseClass): mixed;

    /**
     * Starts an PUT request
     *
     * @param string $node The requested node
     * @param mixed $data The body
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function put(string $node, mixed $data, string $responseClass): mixed;

    /**
     * Starts an PATCH request
     *
     * @param string $node The requested node
     * @param mixed $data The body
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function patch(string $node, mixed $data, string $responseClass): mixed;

    /**
     * Starts an DELETE request
     *
     * @param string $node The requested node
     * @param array<string, mixed> $query The parameters
     * @param string $responseClass The response class
     *
     * @return mixed The mapped response object
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function delete(string $node, array $query, string $responseClass): mixed;
}
