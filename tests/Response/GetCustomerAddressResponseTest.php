<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerAddressTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomerAddressResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_customer_address_response.json';
    }

    public static function getExpectedObject(): GetCustomerAddressResponse
    {
        return new GetCustomerAddressResponse(
            data: CustomerAddressTest::getExpectedObject(),
        );
    }
}
