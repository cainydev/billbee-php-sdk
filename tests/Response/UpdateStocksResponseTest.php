<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\UpdateStockResponse;
use BillbeeDe\BillbeeAPI\Response\UpdateStocksResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\StockUpdateResultTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class UpdateStocksResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/update_stocks_response.json';
    }

    public static function getExpectedObject(): UpdateStocksResponse
    {
        return new UpdateStocksResponse(
            data: [StockUpdateResultTest::getExpectedObject()],
        );
    }
}
