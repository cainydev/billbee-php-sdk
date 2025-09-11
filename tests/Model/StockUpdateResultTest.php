<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\BillbeeAPI\Model\StockUpdateResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class StockUpdateResultTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/stock_update_result.json';
    }

    public static function getExpectedObject(): StockUpdateResult
    {
        return new StockUpdateResult(
            sku: "asd",
            oldStock: 0.0,
            currentStock: 123.0,
            unfulfilledAmount: 0.0,
            message: "The qty was successfully updated from 0 to 123"
        );
    }
}
