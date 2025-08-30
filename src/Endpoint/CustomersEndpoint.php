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

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model as Model;
use BillbeeDe\BillbeeAPI\Response as Response;
use Exception;
use JMS\Serializer\SerializerInterface;

class CustomersEndpoint
{
    /** @var ClientInterface */
    private ClientInterface $client;

    /** @var SerializerInterface */
    private SerializerInterface $serializer;

    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    #region GET

    /**
     * Get a list of all customers
     *
     * @return Response\GetCustomersResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getCustomers(): Response\GetCustomersResponse
    {
        return $this->client->get(
            'customers',
            [],
            Response\GetCustomersResponse::class
        );
    }

    /**
     * Get a single customers
     *
     * @param int|null $id The id of the customer
     * @return Response\GetCustomerResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws Exception If the response cannot be parsed
     */
    public function getCustomer(?int $id): Response\GetCustomerResponse
    {
        if (!is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }
        return $this->client->get(
            'customers/' . $id,
            [],
            Response\GetCustomerResponse::class
        );
    }

    /**
     * Get the addresses for a single customers
     *
     * @param int|null $id The id of the customer
     * @param int $page The start page
     * @param int $pageSize The page size
     *
     * @return Response\GetCustomerAddressesResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws Exception If the response cannot be parsed
     */
    public function getCustomerAddresses(?int $id, int $page = 1, int $pageSize = 50): Response\GetCustomerAddressesResponse
    {
        if (!is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }

        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        return $this->client->get(
            'customers/' . $id . '/addresses',
            $query,
            Response\GetCustomerAddressesResponse::class
        );
    }

    /**
     * Queries a single address from a customer
     *
     * @param int|null $id The id of the address
     *
     * @return Response\GetCustomerAddressResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws Exception If the response cannot be parsed
     */
    public function getCustomerAddress(?int $id): Response\GetCustomerAddressResponse
    {
        if (!is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }

        return $this->client->get(
            'customers/addresses/' . $id,
            [],
            Response\GetCustomerAddressResponse::class
        );
    }

    /**
     * Get the orders for a single customers
     *
     * @param int|null $id The id of the customer
     * @param int $page The start page
     * @param int $pageSize The page size
     *
     * @return Response\GetOrdersResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws Exception If the response cannot be parsed
     */
    public function getCustomerOrders(?int $id, int $page = 1, int $pageSize = 50): Response\GetOrdersResponse
    {
        if (!is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }

        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        return $this->client->get(
            'customers/' . $id . '/orders',
            $query,
            Response\GetOrdersResponse::class
        );
    }

    #endregion

    #region POST

    /**
     * Creates a new customers
     *
     * @param Model\CreateCustomerRequest $request The customer
     * @return Response\GetCustomerResponse The created customer
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function createCustomer(Model\CreateCustomerRequest $request): Response\GetCustomerResponse
    {
        return $this->client->post(
            'customers',
            json_encode($request),
            Response\GetCustomerResponse::class
        );
    }

    #endregion

    #region PUT

    /**
     * Updates a customer
     *
     * @param Model\Customer $customer The customer
     * @return Response\GetCustomersResponse The customer
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidIdException If the customers id is invalid
     * @throws Exception If the response cannot be parsed
     */
    public function updateCustomer(Model\Customer $customer): Response\GetCustomersResponse
    {
        if (!is_integer($customer->id) || $customer->id < 1) {
            throw new InvalidIdException();
        }

        return $this->client->put(
            'customers/' . $customer->id,
            $this->serializer->serialize($customer, 'json'),
            Response\GetCustomerResponse::class
        );
    }

    #endregion


    #region PATCH

    /**
     * Updates one or more fields of an address
     *
     * @param int $addressId The internal id of the address
     * @param array<string, mixed> $model The fields to patch
     *
     * @return ?Response\GetCustomerAddressResponse The address
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     *
     */
    public function patchAddress(int $addressId, array $model): ?Response\GetCustomerAddressResponse
    {
        return $this->client->patch(
            'customers/addresses/' . $addressId,
            $model,
            Response\GetCustomerAddressResponse::class
        );
    }

    #endregion
}
