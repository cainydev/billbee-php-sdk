<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetProductResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\ProductTest;

class GetProductResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/get_product_response.json';
    }

    public static function getExpectedObject(): GetProductResponse
    {
        return new GetProductResponse(
            data: ProductTest::getExpectedObject(),
        );
    }
}
