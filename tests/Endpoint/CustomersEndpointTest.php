<?php

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\CustomersEndpoint;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Model\CreateCustomerRequest;
use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Model\CustomerAddress;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressesResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomersResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class CustomersEndpointTest extends TestCase
{
    private CustomersEndpoint $endpoint;
    private TestClient $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new CustomersEndpoint($this->client);
    }

    public function testGetCustomers()
    {
        $this->endpoint->getCustomers();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCustomersResponse::class, $class);
    }

    public function testGetCustomerFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->endpoint->getCustomer(-1);
    }

    public function testGetCustomer()
    {
        $this->endpoint->getCustomer(123);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCustomerResponse::class, $class);
    }

    public function testGetCustomerAddressesFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->endpoint->getCustomerAddresses(-1);
    }

    public function testGetCustomerAddresses()
    {
        $this->endpoint->getCustomerAddresses(123);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/addresses', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
        ], $data);
        $this->assertSame(GetCustomerAddressesResponse::class, $class);
    }

    public function testGetCustomerAddressFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->endpoint->getCustomerAddress(-1);
    }

    public function testGetCustomerAddress()
    {
        $this->endpoint->getCustomerAddress(123);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/addresses/123', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCustomerAddressResponse::class, $class);
    }

    public function testGetCustomerOrdersFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->endpoint->getCustomerOrders(-1);
    }

    public function testGetCustomerOrders()
    {
        $this->endpoint->getCustomerOrders(123);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/orders', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);
    }

    public function testCreateCustomer()
    {
        $request = new CreateCustomerRequest(address: new CustomerAddress);
        $this->endpoint->createCustomer($request);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('customers', $node);
        $this->assertSame(GetCustomerResponse::class, $class);
    }

    public function testUpdateCustomerFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $customer = new Customer();
        $customer->id = -1;
        $this->endpoint->updateCustomer($customer);
    }

    public function testUpdateCustomer()
    {
        $customer = new Customer();
        $customer->id = 123;
        $this->endpoint->updateCustomer($customer);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('PUT', $method);
        $this->assertSame('customers/123', $node);
        $this->assertSame(GetCustomerResponse::class, $class);
    }

    public function testPatchAddress()
    {
        $this->endpoint->patchAddress(123, ['foo' => 'bar']);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        [$method, $node, $data, $class] = $requests[0];
        $this->assertSame('PATCH', $method);
        $this->assertSame('customers/addresses/123', $node);
        $this->assertSame(['foo' => 'bar'], $data);
        $this->assertSame(GetCustomerAddressResponse::class, $class);
    }
}
