<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetOrderResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\OrderTest;

class GetOrderResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_order_response.json';
    }

    public static function getExpectedObject(): GetOrderResponse
    {
        return new GetOrderResponse(
            data: OrderTest::getExpectedObject(),
        );
    }
}
