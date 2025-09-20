<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetProductsResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\ProductTest;

class GetProductsResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_products_response.json';
    }

    public static function getExpectedObject(): GetProductsResponse
    {
        return new GetProductsResponse(
            data: [ProductTest::getExpectedObject()],
        );
    }
}
