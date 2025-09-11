<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCustomerResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerTest;

class GetCustomerResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_customer_response.json';
    }

    public static function getExpectedObject(): GetCustomerResponse
    {
        return new GetCustomerResponse(
            data: CustomerTest::getExpectedObject()
        );
    }
}
