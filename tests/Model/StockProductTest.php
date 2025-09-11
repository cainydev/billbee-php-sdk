<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\StockProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class StockProductTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/stock_product.json';
    }

    public static function getExpectedObject(): StockProduct
    {
        return new StockProduct(
            name: "Lager 1",
            stockId: 266,
            stockCurrent: 0.0,
            stockWarning: 0.0,
            stockCode: "test",
            unfulfilledAmount: 0.0,
            stockDesired: 0.0
        );
    }
}
