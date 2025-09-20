<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class StockCodeTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/stock_code.json';
    }

    public static function getExpectedObject(): StockCode
    {
        return new StockCode(
            sku: "test",
            stockId: 1234,
            stockCode: "1234"
        );
    }
}
