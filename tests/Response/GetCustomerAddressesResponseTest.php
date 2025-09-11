<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressesResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerAddressTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomerAddressesResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_customer_addresses_response.json';
    }

    public static function getExpectedObject(): GetCustomerAddressesResponse
    {
        return new GetCustomerAddressesResponse(data: [CustomerAddressTest::getExpectedObject()]);
    }
}
