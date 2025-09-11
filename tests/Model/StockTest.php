<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class StockTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/stock.json';
    }

    public static function getExpectedObject(): Stock
    {
        return new Stock(
            sku: "foobar",
            reason: "Import",
            oldQuantity: 12.33,
            newQuantity: 19.66,
            deltaQuantity: 7.33,
            autosubtractReservedAmount: true
        );
    }
}
