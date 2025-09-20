<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetCustomersResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerTest;

class GetCustomersResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_customers_response.json';
    }

    public static function getExpectedObject(): GetCustomersResponse
    {
        return new GetCustomersResponse(
            data: [CustomerTest::getExpectedObject()],
        );
    }
}
