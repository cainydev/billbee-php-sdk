<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\OrderTest;

class GetOrdersResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_orders_response.json';
    }

    public static function getExpectedObject(): GetOrdersResponse
    {
        return new GetOrdersResponse(
            data: [OrderTest::getExpectedObject()],
        );
    }
}
