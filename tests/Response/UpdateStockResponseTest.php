<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\UpdateStockResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\StockUpdateResultTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class UpdateStockResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/update_stock_response.json';
    }

    public static function getExpectedObject(): UpdateStockResponse
    {
        return new UpdateStockResponse(
            data: StockUpdateResultTest::getExpectedObject()
        );
    }
}
