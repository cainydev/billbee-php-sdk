<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model\Search;

use BillbeeDe\BillbeeAPI\Model\Search\ProductResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ProductResultTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Model/Search/product_result.json';
    }

    public static function getExpectedObject(): ProductResult
    {
        return new ProductResult(
            id: 100000060342904,
            shortText: 'test',
            sku: 'PROD1234',
            tags: 'tag1,tag2'
        );
    }
}
