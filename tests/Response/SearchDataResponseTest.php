<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\SearchDataResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;
use BillbeeDe\Tests\BillbeeAPI\Model\Search\ProductResultTest;
use BillbeeDe\Tests\BillbeeAPI\Model\Search\OrderResultTest;
use BillbeeDe\Tests\BillbeeAPI\Model\Search\CustomerResultTest;

class SearchDataResponseTest extends SerializerTestCase
{
    public static function getFixturePath(): string
    {
        return 'Response/search_data_response.json';
    }

    public static function getExpectedObject(): SearchDataResponse
    {
        return new SearchDataResponse(
            products: [ProductResultTest::getExpectedObject()],
            orders: [OrderResultTest::getExpectedObject()],
            customers: [CustomerResultTest::getExpectedObject()]
        );
    }
}
