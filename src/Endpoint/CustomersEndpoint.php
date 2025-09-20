<?php

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\ConnectionException;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Model\CreateCustomerRequest;
use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressesResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomersResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;

readonly class CustomersEndpoint
{
    public function __construct(
        private ClientInterface $client,
    ) {
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function getCustomers(): GetCustomersResponse
    {
        return $this->client->get('customers', GetCustomersResponse::class);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function getCustomer(int $id): GetCustomerResponse
    {
        if ($id < 1) {
            throw new InvalidIdException();
        }
        return $this->client->get("customers/$id", GetCustomerResponse::class);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function getCustomerAddresses(int $id, int $page = 1, int $pageSize = 50): GetCustomerAddressesResponse
    {
        if ($id < 1) {
            throw new InvalidIdException();
        }
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];
        return $this->client->get("customers/$id/addresses", GetCustomerAddressesResponse::class, $query);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function getCustomerAddress(int $id): GetCustomerAddressResponse
    {
        if ($id < 1) {
            throw new InvalidIdException();
        }
        return $this->client->get("customers/addresses/$id", GetCustomerAddressResponse::class);
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function getCustomerOrders(int $id, int $page = 1, int $pageSize = 50): GetOrdersResponse
    {
        if ($id < 1) {
            throw new InvalidIdException();
        }
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];
        return $this->client->get("customers/$id/orders", GetOrdersResponse::class, $query);
    }

    /**
     * @throws QuotaExceededException|ConnectionException
     */
    public function createCustomer(CreateCustomerRequest $request): GetCustomerResponse
    {
        return $this->client->post('customers', GetCustomerResponse::class, json_encode($request));
    }

    /**
     * @throws QuotaExceededException|InvalidIdException|ConnectionException
     */
    public function updateCustomer(Customer $customer): GetCustomerResponse
    {
        if ($customer->id < 1) {
            throw new InvalidIdException();
        }
        return $this->client->put("customers/$customer->id", GetCustomerResponse::class, $customer);
    }

    /**
     * @param array<string, mixed> $fields
     * @throws QuotaExceededException|ConnectionException
     */
    public function patchAddress(int $addressId, array $fields): ?GetCustomerAddressResponse
    {
        return $this->client->patch("customers/addresses/$addressId", GetCustomerAddressResponse::class, $fields);
    }
}